<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RestaurantResource\Pages;
use App\Models\Restaurant;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Hidden;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\ViewColumn;

class RestaurantResource extends Resource
{
    protected static ?string $model = Restaurant::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make([
                    TextInput::make('name')
                        ->required()
                        ->label('Restaurant Name'),
                    Textarea::make('description')
                        ->label('Description'),
                    FileUpload::make('logo')
                        ->label('Logo')
                        ->directory('logos'),
                    KeyValue::make('contact_information')
                        ->label('Contact Information')
                        ->keyLabel('Type')
                        ->valueLabel('Detail')
                        ->default(['phone' => '', 'email' => '']),
                    TextInput::make('rating')
                        ->numeric()
                        ->step(0.1)
                        ->minValue(0)
                        ->maxValue(5)
                        ->default(0.0) // Set the default value for the rating
                        ->label('Rating'),
                    KeyValue::make('opening_hours')
                        ->label('Opening Hours')
                        ->keyLabel('Day')
                        ->valueLabel('Hours')
                        ->default(['Monday' => '9:00-18:00']),
                    Select::make('status')
                        ->options([
                            'open' => 'Open',
                            'closed' => 'Closed',
                        ])
                        ->default('open')
                        ->label('Status'),

                    // Hidden input for user_id
                    Hidden::make('user_id')
                        ->default(Auth::id()) // Automatically set to the logged-in user's ID
                        ->label(false), // Hide label
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Name')->searchable()->sortable(),
                ImageColumn::make('logo')->label('Logo'),
                ViewColumn::make('rating')->view('filament.tables.columns.rating')->label('Rating'),
                BooleanColumn::make('status')->label('Open')->getStateUsing(fn($record) => $record->status === 'open'),
                TextColumn::make('created_at')->label('Created')->dateTime()->sortable(),
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

    /**
     * Automatically set the user_id to the logged-in user.
     */
    public static function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = Auth::id(); // Set the logged-in user's ID
        return $data;
    }

    /**
     * Ensure user_id remains updated when editing.
     */
    public static function mutateFormDataBeforeSave(array $data): array
    {
        $data['user_id'] = Auth::id(); // Update to the logged-in user's ID
        return $data;
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
            'index' => Pages\ListRestaurants::route('/'),
            'create' => Pages\CreateRestaurant::route('/create'),
            'edit' => Pages\EditRestaurant::route('/{record}/edit'),
        ];
    }
}
