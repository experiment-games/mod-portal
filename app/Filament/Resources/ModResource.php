<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ModResource\Pages;
use App\Filament\Resources\ModResource\RelationManagers;
use App\Models\Mod;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Components\SpatieTagsInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SpatieTagsColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ModResource extends Resource
{
    protected static ?string $model = Mod::class;

    protected static ?string $navigationIcon = 'heroicon-o-puzzle-piece';

    public static function getModelLabel(): string
    {
        if (filament_panel_is('admin')) {
            return 'Mods';
        }

        return 'My Mods';
    }

    /**
     * Only show mods for the current user, unless we're in the admin panel.
     */
    public static function getEloquentQuery(): Builder
    {
        if (filament_panel_is('admin')) {
            return parent::getEloquentQuery();
        }

        return parent::getEloquentQuery()->where('author_id', user()->getKey());
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                SpatieTagsInput::make('tags')
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('cover_image_path')
                    ->image()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('author.name')
                    ->sortable(),
                SpatieTagsColumn::make('tags'),
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
            RelationManagers\VersionsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMods::route('/'),
            'create' => Pages\CreateMod::route('/create'),
            'edit' => Pages\EditMod::route('/{record}/edit'),
        ];
    }
}
