<?php

namespace App\Filament\Resources\MateriaResource\Pages;

use App\Filament\Resources\MateriaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMaterias extends ListRecords
{
    protected static string $resource = MateriaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
