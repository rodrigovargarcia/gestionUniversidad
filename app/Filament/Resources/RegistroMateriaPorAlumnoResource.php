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
use Filament\Tables\Filters\Filter;
use Carbon\Carbon;

class RegistroMateriaPorAlumnoResource extends Resource
{
    protected static ?string $model = RegistroMateriaPorAlumno::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('materia_id')
                ->label('Materia')
                ->rules([
                    'required',
                ])
                ->options(Materia::all()->pluck('nombre_materia', 'id')),
                Select::make('alumno_id')
                ->label('Alumno')
                ->rules([
                    'required',
                ])
                ->options(Alumno::all()->pluck('nombre', 'id')),
                Select::make('estado')
                ->label('Estado')
                ->rules([
                    'required',
                ])
                ->options([
                    'aprobado' => 'Aprobado',
                    'desaprobado' => 'Desaprobado',
                    'regular' => 'Regular',
                    'libre' => 'Libre',
                ]),
                DatePicker::make('fecha')
                ->rules([
                    'required',
                ]),
            ]);
    }

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
                Filter::make('fecha')
                    ->form([
                        Forms\Components\DatePicker::make('Desde'),
                        Forms\Components\DatePicker::make('Hasta'),
                    ])
                    ->indicateUsing(function (array $data): array {
                        $indicators = [];
                 
                        if ($data['Desde'] ?? null) {
                            $indicators['from'] = 'Desde el ' . Carbon::parse($data['Desde'])->toFormattedDateString();
                        }
                 
                        if ($data['Hasta'] ?? null) {
                            $indicators['until'] = 'Hasta el ' . Carbon::parse($data['Hasta'])->toFormattedDateString();
                        }
                 
                        return $indicators;
                    })
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['Desde'],
                                fn (Builder $query, $date): Builder => $query->whereDate('fecha', '>=', $date),
                            )
                            ->when(
                                $data['Hasta'],
                                fn (Builder $query, $date): Builder => $query->whereDate('fecha', '<=', $date),
                            );
                    })               
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
