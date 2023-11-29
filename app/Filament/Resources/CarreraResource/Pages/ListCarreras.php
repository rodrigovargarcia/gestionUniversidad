<?php

namespace App\Filament\Resources\CarreraResource\Pages;

use App\Filament\Resources\CarreraResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCarreras extends ListRecords
{
    protected static string $resource = CarreraResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
