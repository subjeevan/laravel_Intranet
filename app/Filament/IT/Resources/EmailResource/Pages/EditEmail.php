<?php

namespace App\Filament\IT\Resources\EmailResource\Pages;

use App\Filament\IT\Resources\EmailResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEmail extends EditRecord
{
    protected static string $resource = EmailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
