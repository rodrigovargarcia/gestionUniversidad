<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RegistroMateriaPorAlumnoResource\Pages;
use App\Filament\Resources\RegistroMateriaPorAlumnoResource\RelationManagers;
use App\Models\RegistroMateriaPorAlumno;
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
use App\Models\Materia;
use App\Models\Alumno;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\SelectFilter;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class RegistroMateriaPorAlumnoResource extends Resource
{
    protected static ?string $model = RegistroMateriaPorAlumno::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('materia_id')
                ->label('Materia')
                ->options(Materia::all()->pluck('nombre_materia', 'id')),
                Select::make('alumno_id')
                ->label('Alumno')
                ->options(Alumno::all()->pluck('nombre', 'id')),
                Select::make('estado')
                ->label('Estado')
                ->options([
                    'aprobado' => 'Aprobado',
                    'desaprobado' => 'Desaprobado',
                    'regular' => 'Regular',
                    'libre' => 'Libre',
                ]),
                DatePicker::make('fecha'),
            ]);
    }

    // $table->foreignId('materia_id')->constrained('materia')->onDelete('cascade');
    // $table->foreignId('alumno_id')->constrained('alumno')->onDelete('cascade');
    // $table->enum('estado',['aprobado', 'desaprobado', 'regular', 'libre']);
    // $table->date('fecha');

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('alumno.nombre')
                ->label('Alumno'),
                TextColumn::make('materia.nombre_materia')
                ->label('Materia'),
                TextColumn::make('estado'),
                TextColumn::make('fecha')
                ->date(),
            ])
            ->filters([
                SelectFilter::make('alumno_id')
                ->options(Alumno::all()->pluck('nombre', 'id')),
                SelectFilter::make('materia_id')
                ->options(Materia::all()->pluck('nombre_materia', 'id')),
                SelectFilter::make('estado')                
                ->options([
                    'aprobado' => 'Aprobado',
                    'desaprobado' => 'Desaprobado',
                    'regular' => 'Regular',
                    'libre' => 'Libre',
                ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                ExportBulkAction::make()
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
            'index' => Pages\ListRegistroMateriaPorAlumnos::route('/'),
            'create' => Pages\CreateRegistroMateriaPorAlumno::route('/create'),
            'edit' => Pages\EditRegistroMateriaPorAlumno::route('/{record}/edit'),
        ];
    }    
}
