<?php

namespace App\Filament\Resources\CarreraResource\Pages;

use App\Filament\Resources\CarreraResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCarrera extends EditRecord
{
    protected static string $resource = CarreraResource::class;

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
        return 'Carrera actualizada';
    }
}
