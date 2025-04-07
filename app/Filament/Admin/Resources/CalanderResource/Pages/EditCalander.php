<?php

namespace App\Filament\Admin\Resources\CalanderResource\Pages;

use App\Filament\Admin\Resources\CalanderResource;
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
