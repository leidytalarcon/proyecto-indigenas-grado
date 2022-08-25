# proyecto-indigenas-grado
#IMPORTAR PROYECTO

    composer install
    composer dump-autoload
    php artisan key:generate
    php artisan jwt:secret
    php artisan cache:clear
    php artisan config:clear

#COMANDOS CREAR BASE DE DATOS

    php artisan migrate

#INSERTAR DATOS INICIALES

    php artisan db:seed --class=DatabaseSeeder