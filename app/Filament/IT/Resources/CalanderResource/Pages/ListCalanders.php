<?php

namespace App\Filament\IT\Resources\CalanderResource\Pages;

use App\Filament\IT\Resources\CalanderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCalanders extends ListRecords
{
    protected static string $resource = CalanderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
