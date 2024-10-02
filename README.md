# Proyecto Restaurante

Este es un proyecto de backend para un sistema de restaurante desarrollado con Laravel. Proporciona una API RESTful para gestionar usuarios, productos, roles, permisos y un carrito de compras.

## Características principales

- Autenticación de usuarios con JWT
- Gestión de roles y permisos (RBAC)
- CRUD de productos
- Carrito de compras
- Envío de correos electrónicos

## Requisitos

- PHP 7.3+
- Composer
- MySQL
- Laravel 8.x

## Instalación

1. Clonar el repositorio
2. Ejecutar `composer install`
3. Copiar `.env.example` a `.env` y configurar las variables de entorno
4. Generar clave de aplicación: `php artisan key:generate`
5. Generar clave JWT: `php artisan jwt:secret`
6. Ejecutar migraciones: `php artisan migrate`
7. Ejecutar seeders: `php artisan db:seed`

## Estructura del proyecto

- `app/Http/Controllers`: Controladores de la API
- `app/Models`: Modelos de Eloquent
- `database/migrations`: Migraciones de la base de datos
- `database/seeders`: Seeders para poblar la base de datos
- `routes/api.php`: Definición de rutas de la API
- `config`: Archivos de configuración

## API Endpoints

### Autenticación

- POST `/api/auth/login`: Iniciar sesión
- POST `/api/auth/register`: Registrar nuevo usuario (cliente)
- POST `/api/auth/registeradmin`: Registrar nuevo usuario (admin)
- POST `/api/auth/logout`: Cerrar sesión
- POST `/api/auth/refresh`: Refrescar token
- GET `/api/auth/profile`: Obtener perfil de usuario
- PUT `/api/auth/update/{id}`: Actualizar usuario
- DELETE `/api/auth/destroy/{id}`: Eliminar usuario

### Productos

- GET `/api/product/index`: Listar productos
- POST `/api/product/store`: Crear producto
- PUT `/api/product/update/{id}`: Actualizar producto
- DELETE `/api/product/destroy/{id}`: Eliminar producto

### Carrito de compras

- GET `/api/products/shop/Shoplist`: Listar items del carrito
- POST `/api/products/shop/add`: Añadir producto al carrito
- PATCH `/api/products/shop/update`: Actualizar cantidad de un item
- DELETE `/api/products/shop/destroy`: Eliminar item del carrito

### Roles

- GET `/api/role/index`: Listar roles
- POST `/api/role/store`: Crear rol
- PUT `/api/role/update/{id}`: Actualizar rol
- DELETE `/api/role/destroy/{id}`: Eliminar rol

### Permisos

- GET `/api/permission/index`: Listar permisos
- GET `/api/permission/Show`: Mostrar permisos de un rol
- POST `/api/permission/ProductAll`: Asignar todos los permisos de productos
- POST `/api/permission/RoleAll`: Asignar todos los permisos de roles
- POST `/api/permission/UserAllClient`: Asignar todos los permisos de cliente
- POST `/api/permission/UserAllEmpleado`: Asignar todos los permisos de empleado
- POST `/api/permission/UserAllAdmin`: Asignar todos los permisos de admin

(Hay más endpoints para asignar permisos específicos)

## Modelos

- User
- Product
- Role
- Permission
- Buy
- Sale

## Características adicionales

- Middleware de autenticación JWT
- Middleware de roles y permisos
- Envío de correos electrónicos para notificaciones de stock bajo
- Tarea programada para verificar el stock de productos

## Comandos personalizados

- `php artisan test:cron`: Ejecuta la tarea programada de verificación de stock

## Pruebas

- Pruebas unitarias y de integración para los controladores y modelos
- Pruebas de API para los endpoints

## Dependencias

- Laravel 8.x
- PHP 7.3+
- Composer
- MySQL
- JWT
- Spatie/laravel-permission
- darryldecode/cart
- fruitcake/laravel-cors
- guzzlehttp/guzzle
- guzzlehttp/promises
- guzzlehttp/psr7
- laravel/framework
- laravel/sanctum
- lcobucci/jwt
- lcobucci/clock
- lcobucci/jwt
- league/commonmark
- league/config
- league/flysystem
- league/mime-type-detection
- monolog/monolog
- namshi/jose
- nesbot/carbon
- nikic/php-parser
- nikic/php-parser
- opis/closure
- php-open-source-saver/jwt-auth
- phpoption/phpoption
- psr/container
- psr/event-dispatcher
- psr/http-client
- psr/http-factory
- psr/http-message
- psr/log
- psr/simple-cache
- psy/psysh
- ralouphie/getallheaders
- ramsey/collection
- ramsey/uuid
- spatie/laravel-permission
- swiftmailer/swiftmailer
- symfony/console
- symfony/css-selector
- symfony/deprecation-contracts
- symfony/event-dispatcher
- symfony/event-dispatcher-contracts
- symfony/finder
- symfony/http-foundation
- symfony/http-kernel
- symfony/mime
- symfony/polyfill-ctype
- symfony/polyfill-iconv
- symfony/polyfill-intl-grapheme
- symfony/polyfill-intl-idn
- symfony/polyfill-intl-normalizer
- symfony/polyfill-mbstring
