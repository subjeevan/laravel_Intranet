<?php

namespace App\Filament\IT\Resources\NewsResource\Pages;

use App\Filament\IT\Resources\NewsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateNews extends CreateRecord
{
    protected static string $resource = NewsResource::class;
}
