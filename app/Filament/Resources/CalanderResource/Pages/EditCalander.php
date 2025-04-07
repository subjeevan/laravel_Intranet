<?php

namespace App\Filament\Resources\CalanderResource\Pages;

use App\Filament\Resources\CalanderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCalander extends EditRecord
{
    protected static string $resource = CalanderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
