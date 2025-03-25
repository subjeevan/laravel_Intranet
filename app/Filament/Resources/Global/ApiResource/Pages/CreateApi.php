<?php

namespace App\Filament\Resources\Global\ApiResource\Pages;

use App\Filament\Resources\Global\ApiResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateApi extends CreateRecord
{
    protected static string $resource = ApiResource::class;
}
