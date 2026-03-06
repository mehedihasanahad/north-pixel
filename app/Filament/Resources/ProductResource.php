<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Category;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon  = 'heroicon-o-cube';
    protected static ?string $navigationGroup = 'Catalog';
    protected static ?int    $navigationSort  = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Tabs::make('Product')
                ->tabs([
                    Forms\Components\Tabs\Tab::make('Basic Info')
                        ->schema([
                            Forms\Components\Select::make('category_id')
                                ->label('Category')
                                ->options(Category::where('is_active', true)->pluck('name_en', 'id'))
                                ->required()
                                ->searchable(),

                            Forms\Components\TextInput::make('slug')
                                ->required()
                                ->unique(ignoreRecord: true)
                                ->maxLength(191)
                                ->live(onBlur: true),

                            Forms\Components\Grid::make(2)->schema([
                                Forms\Components\TextInput::make('title_en')
                                    ->label('Title (English)')
                                    ->required()
                                    ->maxLength(200)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn ($state, Forms\Set $set) =>
                                        $set('slug', Str::slug($state))
                                    ),
                                Forms\Components\TextInput::make('title_bn')
                                    ->label('Title (Bangla)')
                                    ->required()
                                    ->maxLength(200),
                            ]),

                            Forms\Components\Grid::make(2)->schema([
                                Forms\Components\Textarea::make('short_desc_en')
                                    ->label('Short Description (English)')
                                    ->required()
                                    ->maxLength(500)
                                    ->rows(3),
                                Forms\Components\Textarea::make('short_desc_bn')
                                    ->label('Short Description (Bangla)')
                                    ->required()
                                    ->maxLength(500)
                                    ->rows(3),
                            ]),

                            Forms\Components\Grid::make(2)->schema([
                                Forms\Components\RichEditor::make('description_en')
                                    ->label('Full Description (English)')
                                    ->required()
                                    ->fileAttachmentsDisk('public')
                                    ->fileAttachmentsDirectory('products/attachments'),
                                Forms\Components\RichEditor::make('description_bn')
                                    ->label('Full Description (Bangla)')
                                    ->required()
                                    ->fileAttachmentsDisk('public')
                                    ->fileAttachmentsDirectory('products/attachments'),
                            ]),
                        ]),

                    Forms\Components\Tabs\Tab::make('Pricing & URLs')
                        ->schema([
                            Forms\Components\Grid::make(2)->schema([
                                Forms\Components\TextInput::make('price_bdt')
                                    ->label('Price (BDT)')
                                    ->required()
                                    ->numeric()
                                    ->prefix('৳'),
                                Forms\Components\TextInput::make('price_usd')
                                    ->label('Price (USD)')
                                    ->numeric()
                                    ->prefix('$'),
                            ]),

                            Forms\Components\TextInput::make('preview_url')
                                ->label('Preview Subdomain URL')
                                ->url()
                                ->maxLength(500)
                                ->placeholder('https://product-slug.domain.com'),

                            Forms\Components\FileUpload::make('thumbnail_url')
                                ->label('Thumbnail Image')
                                ->image()
                                ->disk('public')
                                ->directory('products/thumbnails')
                                ->imagePreviewHeight('200')
                                ->maxSize(2048),
                        ]),

                    Forms\Components\Tabs\Tab::make('Tech Stack')
                        ->schema([
                            Forms\Components\Repeater::make('techStack')
                                ->label('Technologies Used')
                                ->relationship('techStack')
                                ->schema([
                                    Forms\Components\Grid::make(2)->schema([
                                        Forms\Components\TextInput::make('tech_name')
                                            ->label('Technology Name')
                                            ->required()
                                            ->maxLength(100)
                                            ->placeholder('e.g. Laravel, Vue.js, MySQL'),
                                        Forms\Components\TextInput::make('sort_order')
                                            ->label('Order')
                                            ->numeric()
                                            ->default(0),
                                    ]),
                                ])
                                ->addActionLabel('Add Technology')
                                ->orderColumn('sort_order')
                                ->collapsible()
                                ->defaultItems(0),
                        ]),

                    Forms\Components\Tabs\Tab::make('Status & Sorting')
                        ->schema([
                            Forms\Components\Grid::make(3)->schema([
                                Forms\Components\Toggle::make('is_active')
                                    ->label('Active')
                                    ->default(true),
                                Forms\Components\Toggle::make('is_featured')
                                    ->label('Featured'),
                                Forms\Components\Toggle::make('is_new')
                                    ->label('New')
                                    ->default(true),
                            ]),

                            Forms\Components\Grid::make(2)->schema([
                                Forms\Components\Toggle::make('preview_available')
                                    ->label('Preview Available')
                                    ->helperText('ON = "Live Preview" button. OFF = "Coming Soon" (disabled).')
                                    ->default(false),
                                Forms\Components\Toggle::make('is_coming_soon')
                                    ->label('Coming Soon (Pre-book)')
                                    ->helperText('ON = "Pre-book" order button. OFF = "Order Now".')
                                    ->default(false),
                            ]),

                            Forms\Components\TextInput::make('sort_order')
                                ->label('Sort Order')
                                ->numeric()
                                ->default(0),
                        ]),
                ])
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail_url')
                    ->label('Thumb')
                    ->disk('public')
                    ->width(60)
                    ->height(40),

                Tables\Columns\TextColumn::make('title_en')
                    ->label('Title')
                    ->searchable()
                    ->sortable()
                    ->limit(40),

                Tables\Columns\TextColumn::make('category.name_en')
                    ->label('Category')
                    ->sortable(),

                Tables\Columns\TextColumn::make('price_bdt')
                    ->label('Price (BDT)')
                    ->money('BDT')
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_featured')
                    ->label('Featured')
                    ->boolean(),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean(),

                Tables\Columns\IconColumn::make('is_new')
                    ->label('New')
                    ->boolean(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created')
                    ->date()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category_id')
                    ->label('Category')
                    ->relationship('category', 'name_en'),

                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active'),

                Tables\Filters\TernaryFilter::make('is_featured')
                    ->label('Featured'),

                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('sort_order');
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit'   => Pages\EditProduct::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    {
        return parent::getEloquentQuery()->withTrashed();
    }
}
