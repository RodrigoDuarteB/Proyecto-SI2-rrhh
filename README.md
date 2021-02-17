# Proyecto-SI2-rrhh
Proyecto de SI2, Recursos Humanos

PARA ESTE PRIMER COMMIT SE CREARON:
-- MODELOS
-- CONTROLADORES
-- MIGRACIONES

PASOS A SEGUIR UNA VEZ CLONADO EL REPOSITORIO
1. INSTALAR COMPOSER : composer install
2. INSTALAR SPATIE: composer require spatie/laravel-permission
3. INSTALAR BREEZE: 
	3.1 composer require laravel/breeze --dev
    3.2 php artisan breeze:install
    3.3 npm install
    3.4 npm run dev
4. CREAR SU ARCHIVO .env O NOMBRAR EL ARCHIVO .env.example COMO .env Y CONFIGURAR SUS VARIABLES Y BASE DE DATOS
5. EJECUTAR LAS MIGRACIONES
6. GENERAR LA LLAVE CON php artisan key:generate
7. YA DEBERIAN PODER USAR EL PROYECTO LOCALMENTE SIN PROBLEMAS
