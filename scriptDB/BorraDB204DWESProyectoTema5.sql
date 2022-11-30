/*
    Autor: Manuel Martín Alonso.
    Utilidad: Este programa consiste en borrar la base de datos DAW204DBDepartamentos y borrar el usuario 'usuarioDAW204DBDepartamentos'.
    Fecha-última-revisión: 27-11-2022.
*/
-- Borrar la base de datos DB204DWESProyectoTema5.
drop database if exists DB204DWESProyectoTema5;
-- Borrar el usuario user204DWESProyectoTema5.
drop user if exists 'user204DWESProyectoTema5'@'%';