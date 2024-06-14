Este es un proyecto de API en Laravel que implementa operaciones CRUD para una tabla de personas, protegido con autenticación OAuth2 usando Passport.(Sin terminar)

## Requisitos

-   PHP >= 7.4
-   Composer
-   MySQL
-   Node.js

## Instalación

Clona el repositorio desde GitHub:

git clone
https://github.com/AlejandroSoftwareDeveloper/prueba_tecnica.git

Instalar Dependencias
Instala las dependencias de PHP usando Composer:

Copiar código
cp .env.example .env
php artisan key:generate 4.
Configurar la Base de Datos
Edita el archivo .env y configura la conexión a tu base de datos MySQL:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=prueba_tecnica
DB_USERNAME=root
DB_PASSWORD=

5. Ejecutar Migraciones
   Ejecuta las migraciones para crear las tablas en la base de datos:
   php artisan migrate

6. Instalar Passport

    Instala Passport y genera las claves de encriptación necesarias:
    composer require laravel/passport
    php artisan passport:install

7. Configurar Passport
   Configura Passport en el modelo User. Edita app/Models/User.php
   use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
use HasApiTokens, Notifiable;
}

Registra Passport en el AuthServiceProvider.
Edita app/Providers/AuthServiceProvider.php para registrar las rutas de Passport:

use Laravel\Passport\Passport;

public function boot()
{
$this->registerPolicies();

    Passport::routes();

}

Configura la autenticación API en config/auth.php:

Copiar código
'guards' => [
'api' => [
'driver' => 'passport',
'provider' => 'users',
],
], 8. Iniciar el Servidor de Desarrollo
Inicia el servidor de desarrollo de Laravel:

php artisan serve
El servidor se iniciará en http://localhost:8000.

Uso de la API
La API está protegida con OAuth2. Necesitarás un token de acceso para usarla.

Obtener un Token de Acceso
Utiliza las credenciales del cliente OAuth2 para obtener un token:

Copiar código
POST /oauth/token
Content-Type: application/json

{
"grant_type": "client_credentials",
"client_id": "client-id",
"client_secret": "client-secret"
}
Rutas de la API
GET /api/v1/personas - Listar todas las personas
POST /api/v1/personas - Crear una nueva persona
GET /api/v1/personas/{id} - Obtener una persona por ID
PUT /api/v1/personas/{id} - Actualizar una persona por ID
DELETE /api/v1/personas/{id} - Eliminar una persona por ID
Estructura del Proyecto
El proyecto sigue los principios SOLID y utiliza repositorios para la lógica de datos. La estructura del proyecto es la siguiente:

Modelos: app/Models/Personas.php
Migraciones: database/migrations/YYYY_MM_DD_create_personas_table.php
Controladores: app/Http/Controllers/Api/V1/PersonaController.php
Repositorios:

Rutas: Definidas en routes/api.php
Contribución
Las contribuciones son bienvenidas. Por favor, abre un issue o envía un pull request para cualquier cambio que desees realizar.

Licencia
Este proyecto está licenciado bajo la licencia MIT. Consulta el archivo LICENSE para obtener más información.
