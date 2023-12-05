<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AlumnoResource\Pages;
use App\Filament\Resources\AlumnoResource\RelationManagers;
use App\Models\Alumno;
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
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Validation\Rule;


class AlumnoResource extends Resource
{
    protected static ?string $model = Alumno::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nombre')
                ->label('Nombre')
                ->rules([
                    'required',
                ]),
                TextInput::make('apellido')
                ->label('Apellido')
                ->rules([
                    'required',
                ]),
                TextInput::make('dni')
                ->numeric()
                ->rules([
                    'numeric',
                    'required',
                    Rule::unique('alumno', 'dni'),
                ]),
                TextInput::make('telefono')
                ->label('Teléfono')
                ->rules([
                    'required',
                ]),
                TextInput::make('legajo')
                ->numeric()
                ->rules([
                    'numeric',
                    'required' ,
                    Rule::unique('alumno', 'legajo'),
                ]),
                Select::make('estado')
                ->label('Estado')
                ->rules([
                    'required',
                ])
                ->options([
                    'activo' => 'Activo',
                    'inactivo' => 'Inactivo',
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
                TextColumn::make('nombre')
                ->sortable()
                ->searchable(),
                TextColumn::make('apellido')
                ->searchable(),
                TextColumn::make('dni')                
                ->searchable(),
                TextColumn::make('telefono'),                
                TextColumn::make('legajo')
                ->sortable(),
                TextColumn::make('estado'),
                TextColumn::make('carrera.nombre'),
            ])
            ->filters([                
                SelectFilter::make('estado')
                ->options([
                    'activo' => 'Activo',
                    'inactivo' => 'Inactivo',
                ])
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListAlumnos::route('/'),
            'create' => Pages\CreateAlumno::route('/create'),
            'edit' => Pages\EditAlumno::route('/{record}/edit'),
        ];
    }    
}
