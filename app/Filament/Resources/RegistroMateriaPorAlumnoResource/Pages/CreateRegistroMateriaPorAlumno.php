<?php

namespace App\Filament\Resources\RegistroMateriaPorAlumnoResource\Pages;

use App\Filament\Resources\RegistroMateriaPorAlumnoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRegistroMateriaPorAlumno extends CreateRecord
{
    protected static string $resource = RegistroMateriaPorAlumnoResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Registro creado';
    }
}
