@echo off
start php -S 0.0.0.0:80
timeout /t 2 /nobreak >nul
start http://0.0.0.0:80