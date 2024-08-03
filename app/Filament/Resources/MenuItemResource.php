<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuItemResource\Pages;
use App\Filament\Resources\MenuItemResource\RelationManagers;
use App\Models\MenuItem;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\NumberInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Schema;

class MenuItemResource extends Resource
{
    protected static ?string $model = MenuItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Menu';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make([
                    Select::make('category_id')
                        ->relationship('category', 'name')
                        ->required()
                        ->label('Category'),
                    TextInput::make('name')
                        ->required(),
                    Textarea::make('description'),
                    FileUpload::make('image')
                        ->label('image')
                        ->directory('images'),
                    TextInput::make('price')
                        ->numeric()
                        ->required(),
                        Select::make('availability')
                        ->options([
                            'in_stock' => 'In Stock',
                            'out_of_stock' => 'Out of Stock',
                        ])
                        ->default('in_stock')
                        ->label('Availability'),
                    TextInput::make('preparation_time')
                        ->label('Preparation Time (minutes)')
                        ->numeric()
                        ->minValue(0)
                        ->step(1),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Name')->searchable()->sortable(),
                TextColumn::make('category.name')->label('Category')->sortable(),
                ImageColumn::make('image')->label('Image'),
                TextColumn::make('price')->label('Price')->sortable()->suffix(' USD'),
                SelectColumn::make('availability')
                    ->label('Availability')
                    ->options([
                        'in_stock' => 'In Stock',
                        'out_of_stock' => 'Out of Stock',
                    ]),
                TextColumn::make('preparation_time')
                    ->label('Preparation Time')
                    ->sortable()
                    ->suffix(' mins'),
                TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime()
                    ->sortable(),
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
            'index' => Pages\ListMenuItems::route('/'),
            'create' => Pages\CreateMenuItem::route('/create'),
            'edit' => Pages\EditMenuItem::route('/{record}/edit'),
        ];
    }
}
