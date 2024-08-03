<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LocationResource\Pages;
use App\Filament\Resources\LocationResource\RelationManagers;
use App\Models\Location;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LocationResource extends Resource
{
    protected static ?string $model = Location::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make([
                    Select::make('restaurant_id')
                        ->relationship('restaurant', 'name')
                        ->required()
                        ->label('Restaurant'),
                    TextInput::make('name')
                        ->required()
                        ->label('Location Name'),
                    TextInput::make('address')
                        ->required()
                        ->label('Address'),
                    TextInput::make('city')
                        ->required()
                        ->label('City'),
                    TextInput::make('district')
                        ->label('District'),
                    TextInput::make('postal_code')
                        ->label('Postal Code'),
                    TextInput::make('latitude')
                        ->numeric()
                        ->label('Latitude'),
                    TextInput::make('longitude')
                        ->numeric()
                        ->label('Longitude'),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('restaurant.name')->label('Restaurant')->searchable(),
                TextColumn::make('name')->label('Location Name')->searchable()->sortable(),
                TextColumn::make('address')->label('Address'),
                TextColumn::make('city')->label('City'),
                TextColumn::make('postal_code')->label('Postal Code'),
                TextColumn::make('latitude')->label('Latitude')->sortable(),
                TextColumn::make('longitude')->label('Longitude')->sortable(),
                TextColumn::make('created_at')->label('Created At')->dateTime()->sortable(),
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
            'index' => Pages\ListLocations::route('/'),
            'create' => Pages\CreateLocation::route('/create'),
            'edit' => Pages\EditLocation::route('/{record}/edit'),
        ];
    }
}
