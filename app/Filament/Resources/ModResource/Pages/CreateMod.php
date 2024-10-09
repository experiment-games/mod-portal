<?php

namespace App\Filament\Resources\ModResource\Pages;

use App\Filament\Resources\ModResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMod extends CreateRecord
{
    protected static string $resource = ModResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['author_id'] = user()->id;

        return $data;
    }
}
