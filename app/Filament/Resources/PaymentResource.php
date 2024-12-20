<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentResource\Pages;
use App\Filament\Resources\PaymentResource\RelationManagers;
use App\Models\Payment;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PaymentResource extends Resource
{
    protected static ?string $model = Payment::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    protected static ?int $navigationSort = 3;
    // protected static ?string $navigationGroup = 'Shop';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('order_id')
                    ->relationship('order', 'number') // Assuming the `number` field is in the orders table
                    ->label('Order')
                    ->required()
                    ->reactive() // Make this field reactive
                    ->afterStateUpdated(function (callable $set, $state) {
                        if ($state) {
                            // Fetch the associated order details
                            $order = \App\Models\Order::with('items')->find($state);

                            // Calculate the total amount based on order items
                            $totalAmount = $order?->items->sum('price') ?? 0;

                            // Set the related customer ID and total amount
                            $set('user_id', $order?->user_id);
                            $set('amount', $totalAmount);
                        } else {
                            // Clear fields if no order is selected
                            $set('user_id', null);
                            $set('amount', null);
                        }
                    }),
                Select::make('user_id')
                    ->options(
                        User::role('Customer') // Fetch users with the "Customer" role
                            ->pluck('name', 'id')
                    ) // Assuming `name` is the display field for users
                    ->label('Customer')
                    ->required(),
                TextInput::make('amount')
                    ->numeric()
                    ->label('Amount')
                    ->required(),
                Select::make('provider')
                    ->options([
                        'cash' => 'Cash',
                        'bank' => 'Bank',
                        'mpesa' => 'Mpesa',
                        'ecocash' => 'Ecocash',
                    ])
                    ->label('Payment Provider')
                    ->default('cash')
                    ->required(),
                Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'completed' => 'Completed',
                        'failed' => 'Failed',
                    ])
                    ->label('Status')
                    ->default('pending')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order.number')
                    ->label('Order Number')
                    ->sortable(),
                TextColumn::make('user.name')
                    ->label('User Name')
                    ->sortable(),
                TextColumn::make('amount')
                    ->label('Amount')
                    ->money('USD'), // Replace 'USD' with your currency
                TextColumn::make('provider')
                    ->label('Provider'),
                TextColumn::make('status')
                    ->label('Status')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime(),
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
            'index' => Pages\ListPayments::route('/'),
            'create' => Pages\CreatePayment::route('/create'),
            'edit' => Pages\EditPayment::route('/{record}/edit'),
        ];
    }
}
