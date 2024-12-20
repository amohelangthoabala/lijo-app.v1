<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MealResource\Pages;
use App\Models\Meal;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Grouping\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\QueryBuilder;
use Filament\Tables\Filters\QueryBuilder\Constraints\BooleanConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\DateConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\NumberConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\TextConstraint;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;
use Spatie\ImageOptimizer\OptimizerChainFactory;



class MealResource extends Resource
{
    protected static ?string $model = Meal::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $navigationGroup = 'Shop';

    protected static ?int $navigationSort = 2;

    public static function getLabel(): string
    {
        return 'Meal';
    }

    public static function getPluralLabel(): string
    {
        return 'Meals';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make([
                    // Category Relationship
                    Select::make('category_id')
                        ->relationship('category', 'name') // Relationship defined in Meal model
                        ->required()
                        ->label('Category')
                        ->createOptionForm([
                            Select::make('menu_id')
                                ->relationship('menu', 'name')
                                ->required()
                                ->label('Menu'),
                            TextInput::make('name')
                                ->required(),
                            Textarea::make('description'),
                        ]),

                    // Name
                    TextInput::make('name')
                        ->required()
                        ->label('Meal Name')
                        ->searchable(),

                    // Description
                    Textarea::make('description')
                        ->label('Description')
                        ->nullable(),


                    FileUpload::make('image')
                        ->label('Meal Image')
                        ->directory('images')
                        ->nullable()
                        ->image() // Ensure only images are accepted
                        ->maxSize(2048) // Limit file size (e.g., 2MB)
                        ->acceptedFileTypes(['image/jpeg', 'image/png']) // Restrict to specific formats
                        ->afterStateUpdated(function ($state, callable $set) {
                            if (!$state) {
                                return; // No file uploaded
                            }

                            // Get the full path of the uploaded image
                            $path = storage_path('app/public/images/' . $state);

                            try {
                                // Optimize the image after upload using Spatie Image Optimizer
                                $optimizerChain = OptimizerChainFactory::create();
                                $optimizerChain->optimize($path); // Optimize the image

                                // Optionally, update the database field with the image path
                                $set('image', $state);

                            } catch (\Exception $e) {
                                // Handle any exceptions that occur during image optimization
                                // You could log the error or provide feedback to the user
                                \Log::error('Image optimization failed: ' . $e->getMessage());
                            }
                    }),

                    // Price
                    TextInput::make('price')
                        ->label('Price')
                        ->numeric()
                        ->required(),

                    // Availability (boolean)
                    Select::make('is_available')
                        ->label('Availability')
                        ->options([
                            true => 'Available',
                            false => 'Not Available',
                        ])
                        ->default(true),

                    // Preparation time
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
                ImageColumn::make('image')
                    ->disk('public')
                    ->url(fn($record) => Storage::url($record->image))
                    ->height(50)
                    ->width(50)
                    ->label('Image'),
                TextColumn::make('price')->label('Price')->sortable()->suffix(' USD'),
                SelectColumn::make('is_available')
                    ->label('Availability')
                    ->options([
                        true => 'Available',
                        false => 'Not Available',
                    ]),
                TextColumn::make('preparation_time')->label('Preparation Time')->sortable()->suffix(' mins'),
                TextColumn::make('created_at')->label('Created At')->dateTime()->sortable(),
            ])
            ->filters([
                QueryBuilder::make()
                ->constraints([
                    TextConstraint::make('name'),
                    // TextConstraint::make('slug'),
                    // TextConstraint::make('sku')
                    //     ->label('SKU (Stock Keeping Unit)'),
                    // TextConstraint::make('barcode')
                    //     ->label('Barcode (ISBN, UPC, GTIN, etc.)'),
                    TextConstraint::make('description'),
                    // NumberConstraint::make('price')
                    //     ->label('Compare at price')
                    //     ->icon('heroicon-m-currency-dollar'),
                    NumberConstraint::make('price')
                        ->icon('heroicon-m-currency-dollar'),
                    // NumberConstraint::make('cost')
                    //     ->label('Cost per item')
                    //     ->icon('heroicon-m-currency-dollar'),
                    // NumberConstraint::make('qty')
                    //     ->label('Quantity'),
                    // NumberConstraint::make('security_stock'),
                    BooleanConstraint::make('is_available')
                        ->label('Visibility'),
                    // BooleanConstraint::make('featured'),
                    // BooleanConstraint::make('backorder'),
                    // BooleanConstraint::make('requires_shipping')
                    //     ->icon('heroicon-m-truck'),
                    DateConstraint::make('created_at'),
                ])
                ->constraintPickerColumns(2),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->groups([
                Group::make('category.name')
                    ->collapsible(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Define relationships if needed
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMeals::route('/'),
            'create' => Pages\CreateMeal::route('/create'),
            'edit' => Pages\EditMeal::route('/{record}/edit'),
        ];
    }
}
