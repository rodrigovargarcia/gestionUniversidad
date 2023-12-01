<p align="center">
    <p align="space-between">
    <a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="500" alt="Laravel Logo"></a>
    <a href="#"><img src="https://private-user-images.githubusercontent.com/41773797/257018536-8d5a0b12-4643-4b5c-964a-56f0db91b90a.png?jwt=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJnaXRodWIuY29tIiwiYXVkIjoicmF3LmdpdGh1YnVzZXJjb250ZW50LmNvbSIsImtleSI6ImtleTEiLCJleHAiOjE3MDE0NjQyMzIsIm5iZiI6MTcwMTQ2MzkzMiwicGF0aCI6Ii80MTc3Mzc5Ny8yNTcwMTg1MzYtOGQ1YTBiMTItNDY0My00YjVjLTk2NGEtNTZmMGRiOTFiOTBhLnBuZz9YLUFtei1BbGdvcml0aG09QVdTNC1ITUFDLVNIQTI1NiZYLUFtei1DcmVkZW50aWFsPUFLSUFJV05KWUFYNENTVkVINTNBJTJGMjAyMzEyMDElMkZ1cy1lYXN0LTElMkZzMyUyRmF3czRfcmVxdWVzdCZYLUFtei1EYXRlPTIwMjMxMjAxVDIwNTIxMlomWC1BbXotRXhwaXJlcz0zMDAmWC1BbXotU2lnbmF0dXJlPTY2ZDI4YzMxOThiMzJhZDJjMzI3MjRiNzE4ZDQwY2U5NmI3NGM0MjEyZTEzMzUyYzY3Y2JlOGEyN2Q2YWU3MGUmWC1BbXotU2lnbmVkSGVhZGVycz1ob3N0JmFjdG9yX2lkPTAma2V5X2lkPTAmcmVwb19pZD0wIn0.WRThZOrXTP4DJxeCA6DH-r3HFExkX-JEja5s3zDRE18" alt="Logo Filament" width="500"></a>
    </p>
</p>

# Desafio Macamedia 
### PHP|Laravel|Filament|Eloquent

Desarrollar un sistema para administrar la información de los estudiantes en una universidad. Dado que la universidad no dispone actualmente de un sistema de gestión, se busca crear uno que posibilite registrar estudiantes, carreras, materias y usuarios. Este sistema permitirá vincular a los estudiantes con una carrera específica y llevar un registro histórico de su progreso académico.
[Requisitos Desafío aquí](https://macamedia.com.ar/#/training/informacion)


<p align="center">
    <a href="https://macamedia.com.ar/#/training/informacion"><img src="https://macamedia.com.ar/assets/isologo_blanco-21b619e1.png" widt="400"></a>
</p>


# Descripción del trabajo realizado

Este proyecto fue desarrollado en PHP con el framework Laravel, utiliza Eloquent ORM para interactuar con una base de datos MySQL, y presenta una interfaz de usuario mediante la integración de Filament.

# Características principales

## • ABM (Alta, Baja, Modificación):

Alumnos: Registra estudiantes con nombre, apellido, DNI, carrera, teléfono, número de legajo y estado (activo/inactivo).


Usuarios: Administra usuarios con nombre, correo y contraseña.


Carreras: Gestiona carreras con nombre y duración en años.


Materias: Controla las materias con nombre, carrera asociada, duración (cuatrimestral o anual), y horas de cursado.

## • Búsqueda, Filtrado y Ordenamiento:

Permite realizar un filtrado de alumnos por su nombre, dni y legajo, así como también, por su estado actual en la universidad (activo/inactivo). También, permite al usuario ordenar alfabéticamente por su nombre a cada uno de los alumnos y en orden ascendente o descendente su legajo.

## • Registro Histórico:

En la tabla Registro de Materias por Alumno, podemos visualizar un registro histórico de los examenes realizados por cada uno de los alumnos. A su vez, nos permite realizar filtrados por distintos criterios: Alumno, Materia, Estado de examen y Fecha en un período de tiempo (Desde/Hasta).

## • Validaciones y Restricciones: 

**Validaciones de Campos Vacíos:** Se han implementado validaciones para prevenir que el usuario Administrador pueda guardar registros en las tablas si los campos están vacíos.


**Restricciones Únicas:** Se han implementado restricciones de tipo Unique en la base de datos para datos críticos como legajo y DNI, que evitan errores en el envío de consultas a la base de datos asegurando la integridad de la información. Si un usuario intenta ingresar un dato ya registrado, recibirá un mensaje indicando que el dato ya existe antes de enviar la consulta.

## • Archivo Seeder:

**Usuario Administrador predefinido:** En el archivo seeder se encuentra la creación de un usuario administrador con las siguientes credenciales: 

**Email** = test@example.com

**Password** = 123rodrigo

También junto con la creación de este usuario administrador, se ejecuta código que nos genera registros de carrera, alumno y materias.

## • Exportación de registros:

Mediante la instalación de plugins, permitimos al usuario seleccionar un registro y exportarlo en formato Excel.
