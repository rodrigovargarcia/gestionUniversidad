<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CarreraResource\Pages;
use App\Filament\Resources\CarreraResource\RelationManagers;
use App\Models\Carrera;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Validation\Rule;


class CarreraResource extends Resource
{
    protected static ?string $model = Carrera::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nombre')
                ->label('Nombre de la carrera')
                ->rules([
                    'required',
                ]),
                TextInput::make('duracion_anios')
                ->label('Años de duracion')
                ->rules([
                    'required',
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nombre')
                ->label('Nombre de Carrera'),
                TextColumn::make('duracion_anios')
                ->label('Duracion')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCarreras::route('/'),
            'create' => Pages\CreateCarrera::route('/create'),
            'edit' => Pages\EditCarrera::route('/{record}/edit'),
        ];
    }    
}
