<?php

namespace App\Filament\Resources\ExtensionsResource\Pages;

use App\Filament\Resources\ExtensionsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditExtensions extends EditRecord
{
    protected static string $resource = ExtensionsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
