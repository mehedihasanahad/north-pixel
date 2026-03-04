<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomRequestResource\Pages;
use App\Models\CustomRequest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CustomRequestResource extends Resource
{
    protected static ?string $model = CustomRequest::class;

    protected static ?string $navigationIcon  = 'heroicon-o-pencil-square';
    protected static ?string $navigationGroup = 'Inquiries';
    protected static ?int    $navigationSort  = 1;
    protected static ?string $navigationLabel = 'Custom Requests';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', 'new')->count() ?: null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'warning';
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Client Info')
                ->schema([
                    Forms\Components\Grid::make(3)->schema([
                        Forms\Components\TextInput::make('name')->disabled(),
                        Forms\Components\TextInput::make('email')->disabled(),
                        Forms\Components\TextInput::make('phone')->disabled(),
                    ]),
                ]),

            Forms\Components\Section::make('Project Details')
                ->schema([
                    Forms\Components\Grid::make(3)->schema([
                        Forms\Components\TextInput::make('project_type')
                            ->formatStateUsing(fn ($state) => CustomRequest::$projectTypes[$state] ?? $state)
                            ->disabled(),
                        Forms\Components\TextInput::make('budget')
                            ->formatStateUsing(fn ($state) => CustomRequest::$budgets[$state] ?? $state)
                            ->disabled(),
                        Forms\Components\TextInput::make('preferred_contact')->disabled(),
                    ]),

                    Forms\Components\Textarea::make('project_description')
                        ->disabled()
                        ->rows(4)
                        ->columnSpanFull(),

                    Forms\Components\TextInput::make('deadline')->disabled(),

                    Forms\Components\KeyValue::make('reference_links')
                        ->label('Reference Links')
                        ->disabled(),
                ]),

            Forms\Components\Section::make('Admin')
                ->schema([
                    Forms\Components\Select::make('status')
                        ->options(CustomRequest::$statuses)
                        ->required(),

                    Forms\Components\Textarea::make('admin_notes')
                        ->label('Admin Notes')
                        ->rows(3),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('email')
                    ->searchable(),

                Tables\Columns\TextColumn::make('project_type')
                    ->formatStateUsing(fn ($state) => CustomRequest::$projectTypes[$state] ?? $state)
                    ->badge(),

                Tables\Columns\TextColumn::make('budget')
                    ->formatStateUsing(fn ($state) => CustomRequest::$budgets[$state] ?? $state),

                Tables\Columns\TextColumn::make('preferred_contact')
                    ->badge(),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn ($state) => match($state) {
                        'new'           => 'warning',
                        'seen'          => 'gray',
                        'in_discussion' => 'info',
                        'quoted'        => 'primary',
                        'accepted'      => 'success',
                        'rejected'      => 'danger',
                        'completed'     => 'success',
                        default         => 'gray',
                    }),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Received')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options(CustomRequest::$statuses),

                Tables\Filters\SelectFilter::make('project_type')
                    ->options(CustomRequest::$projectTypes),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label('Review'),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCustomRequests::route('/'),
            'edit'  => Pages\EditCustomRequest::route('/{record}/edit'),
        ];
    }
}
