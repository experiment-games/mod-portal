<?php

namespace App\Filament\Resources\ModResource\Pages;

use App\Filament\Resources\ModResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMods extends ListRecords
{
    protected static string $resource = ModResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
