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
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getSavedNotificationTitle(): ?string
    {
        return 'Registro actualizado';
    }
}
