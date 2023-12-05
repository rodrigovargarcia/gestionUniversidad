<?php

namespace App\Filament\Resources\AlumnoResource\Pages;

use App\Filament\Resources\AlumnoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAlumno extends EditRecord
{
    protected static string $resource = AlumnoResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getSavedNotificationTitle(): ?string
    {
        return 'Alumno actualizado';
    }
}
