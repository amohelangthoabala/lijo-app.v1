<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuCategoryResource\Pages;
use App\Filament\Resources\MenuCategoryResource\RelationManagers;
use App\Models\MenuCategory;
use Filament\Forms;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MenuCategoryResource extends Resource
{
    protected static ?string $model = MenuCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Menu';

    public static function getLabel(): string
    {
        return 'Category';
    }

    public static function getPluralLabel(): string
    {
        return 'Categories';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make([
                    Select::make('menu_id')
                        ->relationship('menu', 'name')
                        ->required()
                        ->label('Menu')
                        ->createOptionForm([
                            Select::make('restaurant_id')
                                ->relationship('restaurant', 'name')
                                ->required()
                                ->label('Restaurant'),
                            TextInput::make('name')
                                ->required(),
                            Textarea::make('description'),
                            KeyValue::make('availability')
                                ->label('Menu Availability')
                                ->keyLabel('Day')
                                ->valueLabel('Hours')
                                ->default(['Monday' => '9:00-18:00']),
                        ]),
                    TextInput::make('name')
                        ->required(),
                    Textarea::make('description'),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Name')->searchable()->sortable(),
                TextColumn::make('description')->label('Description')->searchable()->sortable(),
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
            'index' => Pages\ListMenuCategories::route('/'),
            'create' => Pages\CreateMenuCategory::route('/create'),
            'edit' => Pages\EditMenuCategory::route('/{record}/edit'),
        ];
    }
}
