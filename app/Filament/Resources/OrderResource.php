<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;
    protected static ?string $navigationIcon = 'heroicon-o-clipboard';
    protected static ?string $navigationGroup = 'Orders Management';

    protected static ?int $navigationSort = 100;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make()
                    ->schema([
                        TextInput::make('number')
                            ->default('OR-' . random_int(100000, 999999))
                            ->disabled()
                            ->dehydrated()
                            ->required()
                            ->maxLength(32)
                            ->unique(Order::class, 'number', ignoreRecord: true),
                        Select::make('user_id')
                            ->label('Customer')
                            ->options(
                                User::role('Customer') // Fetch users with the "Customer" role
                                    ->pluck('name', 'id')
                            )
                            ->required(),
                        // Select::make('client_location_id')
                        //     ->relationship('clientLocation', 'name')
                        //     ->required()
                        //     ->createOptionForm([
                        //         TextInput::make('name')
                        //             ->required(),
                        //         Textarea::make('address'),
                        //         TextInput::make('city')
                        //             ->required(),
                        //         TextInput::make('district')
                        //             ->required(),
                        //         TextInput::make('latitude')
                        //             ->required(),
                        //         TextInput::make('longitude')
                        //             ->required(),

                        //     ]),
                        Select::make('type')
                            ->options(['pickup' => 'Pickup', 'delivery' => 'Delivery'])
                            ->required()
                            ->default('delivery')
                            ->live(),
                        DateTimePicker::make('date')->required(),
                        Select::make('status')
                            ->options(['pending' => 'Pending', 'completed' => 'Completed', 'cancelled' => 'Cancelled'])
                            ->required(),

                    ])->columns(2),

                Section::make('Delivery Info')
                    ->relationship('delivery')
                    ->schema([
                        // This section will be conditionally visible if 'type' is 'delivery'
                        Forms\Components\Select::make('driver_id')
                            ->label('Driver')
                            // ->relationship('delivery.driver', 'name')
                            // ->options(User::where('email', 'admin@lijo.co.ls')->pluck('name', 'id'))
                            ->options(
                                User::role('Driver') // Fetch users with the "Customer" role
                                    ->pluck('name', 'id')
                            )
                            ->required(),

                        Forms\Components\Select::make('address_id')
                            ->label('Delivery Address')
                            ->relationship('address', 'name') // Assuming 'address' relationship exists on Delivery model
                            ->required()
                            ->createOptionForm([
                                TextInput::make('name')
                                    ->label('Name')
                                    ->required(),
                                TextInput::make('address')
                                    ->label('Address')
                                    ->required(),
                                TextInput::make('street')
                                    ->label('Street'),
                                TextInput::make('city')
                                    ->label('City'),
                                TextInput::make('district')
                                    ->label('District'),
                                TextInput::make('postal_code')
                                    ->label('Postal Code'),
                                TextInput::make('country')
                                    ->label('Country'),
                                TextInput::make('latitude')
                                    ->label('Latitude')
                                    ->numeric(),
                                TextInput::make('longitude')
                                    ->label('Longitude')
                                    ->numeric(),
                            ]),

                        Forms\Components\Select::make('status')
                            ->options([
                                'pending' => 'Pending',
                                'in_transit' => 'In Transit',
                                'delivered' => 'Delivered',
                                'failed' => 'Failed',
                            ])
                            ->default('pending') // Default to Pending
                            ->required(),

                        DateTimePicker::make('time')
                            ->label('Scheduled Delivery Time')
                            ->nullable(),
                    ])
                    ->columns(2)
                    ->hidden(fn(callable $get) => $get('type') === 'pickup'),

                Section::make('Order items')
                    ->headerActions([
                        Action::make('reset')
                            ->modalHeading('Are you sure?')
                            ->modalDescription('All existing items will be removed from the order.')
                            ->requiresConfirmation()
                            ->color('danger')
                            ->action(fn(Forms\Set $set) => $set('items', [])),
                    ])
                    ->schema([
                        Repeater::make('items')
                            ->relationship('items')
                            ->schema([
                                Select::make('restaurant_id')
                                    ->relationship('restaurant', 'name') // Assuming the OrderItem model has a `restaurant` relationship
                                    ->searchable() // Makes the field searchable
                                    ->required()
                                    ->preload()
                                    ->reactive(), // Ensures updates propagate dynamically

                                Select::make('meal_id')
                                    ->label('Meal')
                                    ->options(function (callable $get) {
                                        $restaurantId = $get('restaurant_id'); // Get the selected restaurant ID
                                        return $restaurantId
                                            ? \App\Models\Meal::where('restaurant_id', $restaurantId)->pluck('name', 'id') // Filter meals by restaurant
                                            : \App\Models\Meal::pluck('name', 'id'); // Show all meals if no restaurant is selected
                                    })
                                    ->searchable() // Makes the field searchable
                                    ->required()
                                    ->reactive() // Ensures it updates other fields dynamically
                                    ->afterStateUpdated(function (callable $set, callable $get, $state) {
                                        if ($state) {
                                            // Find the restaurant_id for the selected meal
                                            $meal = \App\Models\Meal::find($state);
                                            $currentRestaurantId = $get('restaurant_id');

                                            // Set restaurant_id only if it's not already manually set
                                            if ($meal && (!$currentRestaurantId || $currentRestaurantId !== $meal->restaurant_id)) {
                                                $set('restaurant_id', $meal->restaurant_id);
                                            }

                                            if ($meal) {
                                                $set('price', $meal->price); // Auto-fill price
                                            }
                                        }
                                    }),
                                TextInput::make('quantity')
                                    ->numeric()
                                    ->default(1)
                                    ->minValue(1)
                                    ->required(),
                                TextInput::make('price')
                                    ->numeric()
                                    ->required(),
                            ])->columns(4),
                    ]),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('type'),
                // ->enum(['pick' => 'Pick', 'delivery' => 'Delivery']),
                TextColumn::make('date')->dateTime(),
                SelectColumn::make('status')
                    // ->badge()
                    // ->editable()
                    // ->enum([
                    //     'pending' => 'Pending',
                    //     'completed' => 'Completed',
                    //     'cancelled' => 'Cancelled',
                    // ])
                    // ->colors([
                    //     'secondary',
                    //     'success' => 'completed',
                    //     'danger' => 'cancelled',
                    // ])
                    ->options([
                        'pending' => 'Pending',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ]),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
