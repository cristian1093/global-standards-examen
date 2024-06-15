Proyecto Laravel-Vue-PostgreSQL

Descripción
Este proyecto es una aplicación web desarrollada utilizando Laravel para el backend y Vue.js para el frontend, con PostgreSQL como sistema de gestión de bases de datos. Este README proporciona una visión general de las tecnologías utilizadas, cómo configurar el entorno de desarrollo y cómo desplegar la aplicación.

Tecnologías Utilizadas

Laravel
Laravel es un framework de PHP que facilita el desarrollo de aplicaciones web robustas y escalables. Proporciona un conjunto de herramientas y recursos predefinidos para construir aplicaciones PHP de alta calidad.

*Sitio web: Laravel
*Documentación: Documentación de Laravel
*Requisitos: PHP >= 7.3, Composer

Vue.js

Vue.js es un framework progresivo de JavaScript para construir interfaces de usuario. Integra bien con otras bibliotecas o proyectos existentes y es lo suficientemente capaz como para impulsar aplicaciones de una sola página (SPA) cuando se combina con herramientas modernas y bibliotecas.

*Sitio web: Vue.js
*Documentación: Documentación de Vue.js
*Requisitos: Node.js, npm o yarn

PostgreSQL

PostgreSQL es un sistema de gestión de bases de datos relacional de código abierto que enfatiza la extensibilidad y el cumplimiento de estándares técnicos. Está diseñado para manejar una variedad de cargas de trabajo, desde pequeñas aplicaciones de una sola máquina hasta grandes aplicaciones de internet con muchos usuarios concurrentes.

*Sitio web: PostgreSQL
*Documentación: Documentación de PostgreSQL

Requisitos Previos

Antes de comenzar, asegúrate de tener instaladas las siguientes herramientas:

*PHP >= 7.3
*Composer
*Node.js
*npm o yarn
*PostgreSQL

Instalación

Clonar el Repositorio

Ejemplo "git clone git@github.com:cristian1093/global-standards-examen.git"


Configuración del Backend (Laravel)

Instalar Dependencias de PHP:

composer install

Configurar el Archivo .env:

Copia el archivo .env.example a .env y actualiza las variables de entorno, especialmente las configuraciones de la base de datos:

env
Copiar código
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=nombre_de_tu_base_de_datos
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña


Migrar la Base de Datos:
php artisan migrate

Crear el Enlace Simbólico para Almacenamiento Público:
php artisan storage:link



Configuración del Frontend (Vue.js)

Instalar Dependencias de Node.js:
npm install

Compilar los Activos del Frontend:
npm run dev



Ejecución de la Aplicación

Iniciar el Servidor de Desarrollo
php artisan serve

Esto iniciará el servidor de desarrollo en http://localhost:8000.

Compilar y Ver Cambios en el Frontend
npm run watch

Esto permitirá ver cambios en tiempo real mientras desarrollas el frontend.

Se generaron pruebas unitarias tanto de movies como de schedule
php artisan test
