<?php

namespace App\Filament\Resources\Global\ApiResource\Pages;

use App\Filament\Resources\Global\ApiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListApis extends ListRecords
{
    protected static string $resource = ApiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
