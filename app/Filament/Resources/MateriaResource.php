<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MateriaResource\Pages;
use App\Filament\Resources\MateriaResource\RelationManagers;
use App\Models\Materia;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;
use App\Models\Carrera;

class MateriaResource extends Resource
{
    protected static ?string $model = Materia::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nombre_materia')
                ->label('Materia')
                ->rules([
                    'required',
                ]),
                TextInput::make('horas_cursado')
                ->numeric()
                ->label('Cantidad de horas de cursado')
                ->rules([
                    'required',
                ]),
                Select::make('duracion')
                ->label('Cursado')
                ->rules([
                    'required',
                ])
                ->options([
                    'cuatrimestral' => 'Cuatrimestral',
                    'anual' => 'Anual',
                ]),
                Select::make('carrera_id')
                ->label('Carrera')
                ->rules([
                    'required',
                ])
                ->options(Carrera::all()->pluck('nombre','id')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nombre_materia')
                ->label('Materia'),
                TextColumn::make('horas_cursado')
                ->label('Carga horaria'),
                TextColumn::make('duracion')
                ->label('Duración'),
                TextColumn::make('carrera.nombre'),
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
            'index' => Pages\ListMaterias::route('/'),
            'create' => Pages\CreateMateria::route('/create'),
            'edit' => Pages\EditMateria::route('/{record}/edit'),
        ];
    }    
}
