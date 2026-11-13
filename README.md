# 🌱 Agropecuaria Agrovalle - Sistema de Gestión Agropecuaria

Sistema web de gestión para **AGROVALLE Honduras**, desarrollado con **Laravel** y **MySQL (XAMPP)**. Permite administrar el catálogo de insumos agrícolas con su inventario, los fabricantes y proveedores, y el personal de la empresa, con un dashboard gerencial de indicadores clave y acceso protegido por autenticación.

---

## 📑 Tabla de contenido

1. [Características](#-características)
2. [Tecnologías](#-tecnologías)
3. [Requisitos previos](#-requisitos-previos)
4. [Instalación paso a paso](#-instalación-paso-a-paso)
5. [Credenciales de acceso (seeder)](#-credenciales-de-acceso-seeder)
6. [Estructura del proyecto](#-estructura-del-proyecto)
7. [Rutas del sistema](#-rutas-del-sistema)
8. [Módulos](#-módulos)
9. [Base de datos](#-base-de-datos)
10. [Seguridad](#-seguridad)
11. [Control de versiones con Git](#-control-de-versiones-con-git)
12. [Solución de problemas](#-solución-de-problemas)
13. [Repositorio](#-repositorio)

---

## ✨ Características

- **Autenticación** con correo institucional `@agrovalle.hn`, casilla "Recordar mi sesión" y cierre de sesión seguro.
- **Dashboard gerencial** con 4 indicadores calculados dinámicamente desde la base de datos.
- **Módulo de Insumos e Inventario** con CRUD completo, buscador por nombre o SKU, paginación, semáforo de existencias y subida de fotografías de empaques.
- **Módulo de Proveedores** con validación estricta de RTN y teléfono, plazos de crédito y estados.
- **Módulo de Empleados** (Recursos Humanos y Personal Técnico) con validación de DNI, cargos y salarios en Lempiras.
- **Plantilla corporativa** con barra superior (usuario autenticado y cierre de sesión), menú lateral con enlaces activos dinámicos y pie de página institucional.
- **Rutas organizadas**: públicas para invitados y protegidas para usuarios autenticados.

---

## 🛠 Tecnologías

| Tecnología | Uso |
|---|---|
| Laravel 12 | Framework backend (PHP) |
| PHP 8.2 | Lenguaje del servidor |
| MySQL (XAMPP) | Base de datos |
| Bootstrap 5.2 | Estilos y componentes |
| SB Admin (Start Bootstrap) | Plantilla del panel administrativo |
| Composer | Gestor de dependencias PHP |
| Git | Control de versiones |

---

## 📋 Requisitos previos

- [XAMPP](https://www.apachefriends.org/) con **Apache** y **MySQL** (PHP 8.2 o superior)
- [Composer](https://getcomposer.org/)
- [Git](https://git-scm.com/)
- Navegador web actualizado

---

## 🚀 Instalación paso a paso

### 1. Clonar el repositorio

```bash
git clone https://github.com/JosueMartinezdev25/Examen2
cd Examen2
```

### 2. Instalar dependencias de PHP

```bash
composer install
```

### 3. Crear el archivo de entorno

```bash
# Windows (CMD)
copy .env.example .env

# Linux / Mac
cp .env.example .env
```

### 4. Crear la base de datos

1. Abre el panel de XAMPP y enciende **Apache** y **MySQL**.
2. Entra a [phpMyAdmin](http://localhost/phpmyadmin).
3. Crea una base de datos llamada **`Examen2`** (cotejamiento `utf8mb4_unicode_ci`).

### 5. Ejecutar migraciones y seeders

```bash
php artisan migrate --seed
```

Esto crea todas las tablas y el usuario administrador. Si prefieres hacerlo por separado:

```bash
php artisan migrate
php artisan db:seed
```

### 6. Verificar los archivos de la plantilla

Deben existir estos dos archivos (plantilla SB Admin):

```
public/sb-admin/css/styles.css
public/sb-admin/js/scripts.js
```

### 7. Iniciar el servidor

```bash
php artisan serve
```

Abre [http://127.0.0.1:8000](http://127.0.0.1:8000) e inicia sesión con las credenciales de la siguiente sección.

---

## 🔑 Credenciales de acceso (seeder)

Uno de los seeders (`UserSeeder`) crea el usuario administrador del sistema:

| Campo | Valor |
|---|---|
| **Correo** | `admin@agrovalle.hn` |
| **Contraseña** | `admin123` |

- El login solo acepta correos que terminen en `@agrovalle.hn` (correo institucional).
- La contraseña se guarda cifrada con **Bcrypt** (`Hash::make`), nunca en texto plano.
- El seeder usa `updateOrCreate`, por lo que se puede ejecutar varias veces sin duplicar al usuario.
- ⚠️ **Cambia esta contraseña antes de usar el sistema en un entorno real.**

También es posible crear usuarios nuevos desde la pantalla de registro (`/register`), siempre con correo `@agrovalle.hn`.

---

## 📂 Estructura del proyecto

```
├── app/
│   ├── Http/Controllers/
│   │   ├── AuthController.php        # Login, registro y logout
│   │   ├── DashboardController.php   # Indicadores clave (KPIs)
│   │   ├── InsumosController.php     # CRUD de insumos + subida de fotos
│   │   ├── ProveedoresController.php # CRUD de proveedores
│   │   └── EmpleadosController.php   # CRUD de empleados
│   └── Models/
│       ├── User.php
│       ├── Insumos.php
│       ├── Proveedores.php
│       └── Empleado.php
├── database/
│   ├── migrations/                   # Estructura de las tablas
│   └── seeders/
│       ├── DatabaseSeeder.php
│       └── UserSeeder.php            # Usuario administrador
├── public/
│   ├── sb-admin/                     # Plantilla (css y js)
│   └── uploads/insumos/              # Fotografías de empaques
├── resources/views/
│   ├── layouts/admin.blade.php       # Plantilla corporativa
│   ├── auth/                         # login y register
│   ├── dashboard.blade.php
│   ├── insumos/                      # index, create, edit
│   ├── proveedores/                  # index, create, edit
│   └── empleados/                    # index, create, edit
└── routes/web.php                    # Rutas públicas y protegidas
```

La separación de responsabilidades sigue el patrón **MVC**: los modelos manejan los datos, los controladores la lógica y validaciones, y las vistas Blade la presentación.

---

## 🛣 Rutas del sistema

### Públicas (solo invitados, middleware `guest`)

| Método | Ruta | Descripción |
|---|---|---|
| GET | `/login` | Formulario de inicio de sesión |
| POST | `/login` | Procesar inicio de sesión |
| GET | `/register` | Formulario de registro |
| POST | `/register` | Procesar registro |

### Protegidas (usuarios autenticados, middleware `auth`)

| Método | Ruta | Descripción |
|---|---|---|
| GET | `/` | Redirige al dashboard |
| GET | `/dashboard` | Dashboard gerencial |
| POST | `/logout` | Cerrar sesión |
| Resource | `/insumos` | index, create, store, edit, update, destroy |
| Resource | `/proveedores` | index, create, store, edit, update, destroy |
| Resource | `/empleados` | index, create, store, edit, update, destroy |

Un invitado que intenta entrar a una ruta protegida es redirigido a `/login`. Un usuario con sesión que entra a `/login` es redirigido al dashboard.

Para ver todas las rutas registradas:

```bash
php artisan route:list
```

---

## 📦 Módulos

### 📊 Dashboard Gerencial

Muestra 4 tarjetas con datos calculados en tiempo real:

| Indicador | Cálculo |
|---|---|
| Insumos en Catálogo | Total de registros en `insumos` |
| Proveedores Activos | Proveedores con `estado = 1` |
| Empleados en Nómina | Total de registros en `empleados` |
| Valor del Inventario | `SUM(inventario × precio)` en Lempiras |

### 🌾 Insumos Agropecuarios e Inventario

- CRUD completo con redirecciones y mensajes flash.
- **Buscador** por nombre o código (SKU) y **paginación** de 10 registros.
- **Miniatura** de la foto del empaque en el listado.
- **Semáforo de existencias:**

| Inventario | Badge |
|---|---|
| Mayor a 20 | 🟢 Óptimo |
| De 10 a 20 | 🟡 Moderado |
| Menor a 10 | 🔴 ¡Desabastecimiento! |

- **Validaciones:** código único (ignorando el ID actual al editar), precio mayor a 0, costo y existencias mayores o iguales a 0, categoría dentro de la lista permitida.
- **Categorías:** Fertilizantes, Semillas Certificadas, Agroquimicos, Herramientas, Sistemas de Riego.
- **Fotografías:** formatos `jpg`, `jpeg`, `png` y `webp`, máximo 5 MB. Se guardan en `public/uploads/insumos/` con nombre único y se eliminan al borrar o reemplazar el insumo.
- Eliminación con confirmación emergente en JavaScript.

### 🏭 Fabricantes y Proveedores Agrícolas

- CRUD completo con mensajes flash.
- **Validaciones:**
  - RTN de exactamente **14 dígitos** y único en la tabla.
  - Teléfono de **8 dígitos** que inicia con **2, 3, 8 o 9**.
  - Límite de crédito numérico mayor o igual a 0.
  - Días de crédito válidos: **15, 30, 45 o 60**.
- **Categorías:** Quimicos, Semilleros, Maquinaria.
- **Badges:** estado (🟢 Activo / ⚪ Inactivo) y plazo de crédito (ej. "30 dias").
- El estado se guarda como número: `1` = Activo, `0` = Inactivo.

### 👥 Recursos Humanos y Personal Técnico

- CRUD completo con mensajes flash.
- **Validaciones:** DNI de exactamente **13 dígitos numéricos** y único, salario mayor a 0, fecha de ingreso válida, cargo obligatorio, correo válido.
- **Cargos:** Ingeniero Agronomo, Asesor Tecnico de Campo, Jefe de Bodega Central, Operador de Maquinaria, Cajero.
- Badge de **color distinto según el cargo**, salario con formato en Lempiras (`L. XX,XXX.XX`) y fecha formateada (`dd/mm/aaaa`).
- El estado se guarda como número: `1` = Activo, `0` = Inactivo.

---

## 🗄 Base de datos

**Nombre:** `Examen2` (MySQL)

### `users`
Tabla estándar de Laravel (`name`, `email`, `password`, ...). Las contraseñas se almacenan con Bcrypt.

### `insumos`

| Campo | Tipo | Notas |
|---|---|---|
| id | bigint | Llave primaria |
| codigo | string | SKU, único |
| nombre | string | |
| categoria | string | Lista fija |
| precio | decimal(10,2) | Mayor a 0 |
| costo | decimal(10,2) | |
| inventario | integer | Existencias |
| imagen | string | Nullable, nombre del archivo |
| fabricante | string | |
| fecha_vencimiento | date | Nullable |
| fecha_registro | date | |
| numero_lote | string | |
| timestamps | | created_at, updated_at |

### `proveedores`

| Campo | Tipo | Notas |
|---|---|---|
| id | bigint | Llave primaria |
| rtn | string(14) | Único |
| empresa | string | Razón social |
| contacto | string | Asesor comercial |
| telefono | string(8) | |
| categoria | string | Quimicos, Semilleros, Maquinaria |
| limite_credito | decimal(12,2) | En Lempiras |
| dias_credito | integer | 15, 30, 45 o 60 |
| estado | integer | 1 = Activo, 0 = Inactivo |
| fecha_registro | date | |
| timestamps | | |

### `empleados`

| Campo | Tipo | Notas |
|---|---|---|
| id | bigint | Llave primaria |
| identidad | string(13) | DNI, único |
| nombre | string(255) | |
| apellido | string(255) | |
| correo | string(255) | |
| cargo | string(50) | |
| salario | decimal(10,2) | En Lempiras |
| estado | integer | 1 = Activo, 0 = Inactivo (por defecto 1) |
| fecha_ingreso | date | |
| timestamps | | |

---

## 🔒 Seguridad

- **Protección CSRF:** la directiva `@csrf` está incluida en la totalidad de los formularios del sistema (los formularios de eliminación incluyen además `@method('DELETE')`).
- **Contraseñas cifradas** con Hash Bcrypt.
- **Prevención de fijación de sesión:** al iniciar sesión con credenciales válidas se regenera la sesión (`session()->regenerate()`) y se redirige a la URL prevista con `redirect()->intended()`.
- **Inicio de sesión fallido:** se regresa al formulario con `back()` conservando únicamente el correo ingresado.
- **Cierre de sesión seguro:** `logout()` cierra la sesión, la invalida (`invalidate()`), regenera el token CSRF y redirige al login.
- **Validación estricta** de todas las entradas en los controladores, con mensajes de error por campo.
- **Rutas protegidas** con middleware `auth`; las pantallas de acceso con `guest`.
- **Archivos subidos:** validación de tipo y tamaño, y nombre de archivo único generado por el servidor.
- El archivo `.env` **no se versiona** (está en `.gitignore`).

---

## 🌿 Control de versiones con Git

- Repositorio inicializado con la rama principal **`main`**.
- El `.gitignore` excluye `/vendor`, `/node_modules`, `.env` y las fotografías subidas (`/public/uploads/insumos/*`).
- Se mantiene `.env.example` como plantilla de configuración, sin datos sensibles.
- Commits descriptivos por módulo, por ejemplo:

```bash
git add .
git commit -m "Módulo de insumos: CRUD, subida de imágenes y buscador"
```

---

## 🧯 Solución de problemas

| Problema | Causa probable | Solución |
|---|---|---|
| Página sin estilos y menú desordenado | Falta la carpeta de la plantilla | Verifica `public/sb-admin/css/styles.css` |
| El botón del menú lateral no responde | Falta `scripts.js` | Verifica `public/sb-admin/js/scripts.js` |
| Las fotos no se suben o no se ven | Carpeta inexistente o límite de PHP | Crea `public/uploads/insumos/` y en `php.ini` pon `upload_max_filesize` y `post_max_size` en `5M` o más; reinicia Apache |
| "Missing required parameter" o formulario de edición vacío | El nombre de la variable del controlador no coincide con el parámetro de la ruta | Revisa `php artisan route:list` y el `->parameters([...])` en `routes/web.php` |
| `Table 'proveedors' doesn't exist` | Laravel pluraliza el nombre del modelo con reglas del inglés | Agrega `protected $table = 'proveedores';` al modelo |
| `Unknown column 'identidad1'` | Falta la coma en la regla `unique` del `update` | Debe ser `unique:empleados,identidad,` . `$empleado->id` |
| Error 419 "Page Expired" | Falta `@csrf` en un formulario | Agrega `@csrf` dentro del `<form>` |
| El login rechaza el correo | El correo no termina en `@agrovalle.hn` | Usa un correo institucional |
| Error de conexión a la base de datos | MySQL apagado o `.env` incorrecto | Enciende MySQL en XAMPP y revisa las variables `DB_*` |

---

## 🔗 Repositorio

Código fuente del proyecto:

[https://github.com/JosueMartinezdev25/Examen2](https://github.com/JosueMartinezdev25/Examen2)

---

&copy; 2026 Agropecuaria Agrovalle - Sistema de Gestión Agropecuaria
