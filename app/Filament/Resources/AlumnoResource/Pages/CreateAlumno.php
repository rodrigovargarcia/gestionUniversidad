<?php

namespace App\Filament\Resources\AlumnoResource\Pages;

use App\Filament\Resources\AlumnoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAlumno extends CreateRecord
{
    protected static string $resource = AlumnoResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Alumno creado';
    }
}