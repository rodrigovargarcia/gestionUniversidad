<?php

namespace App\Filament\Resources\RegistroMateriaPorAlumnoResource\Pages;

use App\Filament\Resources\RegistroMateriaPorAlumnoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRegistroMateriaPorAlumno extends EditRecord
{
    protected static string $resource = RegistroMateriaPorAlumnoResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
