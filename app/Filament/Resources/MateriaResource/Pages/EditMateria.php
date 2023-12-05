<?php

namespace App\Filament\Resources\MateriaResource\Pages;

use App\Filament\Resources\MateriaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMateria extends EditRecord
{
    protected static string $resource = MateriaResource::class;

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
        return 'Materia actualizada';
    }
}
