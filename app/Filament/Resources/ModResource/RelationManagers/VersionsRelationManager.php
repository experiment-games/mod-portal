<?php

namespace App\Filament\Resources\ModResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VersionsRelationManager extends RelationManager
{
    protected static string $relationship = 'versions';

    /*        Schema::create('mod_versions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mod_id')->constrained()->cascadeOnDelete();
            $table->string('version');
            $table->longText('release_notes')->nullable();
            $table->string('file_path')->nullable(); // If stored on-site
            $table->string('external_link')->nullable(); // If stored off-site
            $table->string('hash'); // Hash to verify file integrity
            $table->timestamps();
        });*/

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('version')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('release_notes')
                    ->nullable()
                    ->rows(3),

                Forms\Components\Checkbox::make('self_hosted')
                    ->live()
                    ->dehydrated(false)
                    ->default(false),

                Forms\Components\FileUpload::make('file_path')
                    ->nullable()
                    ->hidden(fn (Get $get) => $get('self_hosted')),

                Forms\Components\TextInput::make('external_link')
                    ->nullable()
                    ->maxLength(255)
                    ->hidden(fn (Get $get) => !$get('self_hosted')),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('version')
            ->columns([
                Tables\Columns\TextColumn::make('version'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
