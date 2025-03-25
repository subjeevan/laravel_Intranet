<?php

namespace App\Filament\Resources\Global\ApiResource\Pages;

use App\Filament\Resources\Global\ApiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditApi extends EditRecord
{
    protected static string $resource = ApiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
