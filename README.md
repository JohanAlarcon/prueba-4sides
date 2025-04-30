content = '''# Proyecto Laravel 11 – Gestión de Usuarios

¡Bienvenido! Este repositorio contiene un proyecto base en **Laravel 11.44.7** con las siguientes características listas para usar:

* Autenticación Breeze apuntando a la tabla personalizada `seg_usuario`.
* Panel de administración con **AdminLTE 3 + Bootstrap 5**.
* CRUD completo de usuarios (listar, crear, editar, eliminar, ver detalle).
* Subida de foto con pre-visualización tanto en altas/ediciones como en "Mi perfil".
* Perfil del usuario autenticado.
* Listeners que marcan `usuarioConectado` y `usuarioUltimaConexión` en login/logout.

---

## 1. Requisitos

| Software | Versión mínima |
|----------|----------------|
| PHP      | 8.2            |
| Composer | 2.x            |
| Node.js  | 18.x           |
| npm      | 9.x            |
| MySQL    | 5.7 / 8.0      |
| Git      | 2.x            |

---

## 2. Instalación paso a paso

```bash
# 1. Clonar el repositorio
$ git clone https://github.com/tu-usuario/tu-repo.git
$ cd tu-repo

# 2. Dependencias backend
$ composer install

# 3. Dependencias front-end
$ npm install

# 4. Variables de entorno
$ cp .env.example .env
# Edita .env y configura la conexión a MySQL

# 5. Generar clave de aplicación
$ php artisan key:generate

# 6. Migraciones 
$ php artisan migrate:fresh --seed

# 7. Enlace a storage para las fotos
$ php artisan storage:link

# 8. Compilar assets (modo desarrollo)
$ npm run dev   # ó  npm run build  para producción

# 9. Levantar servidor
$ php artisan serve