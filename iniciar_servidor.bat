@echo off
title Clinicas Comunitarias - Servidor Local
echo ========================================================
echo   Iniciando Portal de Clinicas Comunitarias (Laravel)
echo ========================================================
echo.
cd /d "%~dp0"
echo Abriendo el navegador en http://127.0.0.1:8000 ...
start http://127.0.0.1:8000
echo Servidor iniciado. Presiona Ctrl + C para detenerlo.
echo.
php artisan serve
pause
