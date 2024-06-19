@echo off
start php -S 0.0.0.0:80
timeout /t 2 /nobreak >nul
start http://127.0.0.1/convert.php