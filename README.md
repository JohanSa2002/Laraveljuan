# 🚀 UTP Académico - Sistema de Gestión de Investigaciones

Este proyecto es una plataforma para la gestión de eventos científicos y artículos de investigación para la UTP. Está construido con tecnologías modernas y diseñado para ejecutarse fácilmente mediante contenedores.

## 🛠 Stack Tecnológico

*   **Backend:** [Laravel 11](https://laravel.com/) (PHP 8.2)
*   **Frontend:** [Blade](https://laravel.com/docs/11.x/blade) + [Tailwind CSS](https://tailwindcss.com/) + [Vite](https://vitejs.dev/)
*   **Base de Datos:** SQLite (Persistida en volumen Docker)
*   **Infraestructura:** Docker + Docker Compose
*   **Servidor Web:** Nginx (Alpine Liquid)
*   **Diseño:** Cyber Purple System (Glassmorphism & High Contrast)

---

## 📦 Instalación con Docker (Paso a Paso)

Sigue estos pasos para instalar y ejecutar la aplicación en cualquier computadora.

### 1. Requisitos Previos
*   Tener instalado [Docker Desktop](https://www.docker.com/products/docker-desktop/).
*   Asegurarse de que Docker esté iniciado.

### 2. Obtener el Código
*   **Opción A (Git):** `git clone https://github.com/JohanSa2002/Laraveljuan.git`
*   **Opción B (ZIP):** Descarga el ZIP desde GitHub y descomprímelo en una carpeta.

### 3. Configuración Inicial
Abre una terminal (PowerShell o CMD) dentro de la carpeta del proyecto y ejecuta:

```bash
# Copiar el archivo de entorno pre-configurado para Docker
copy .env.docker .env
```

### 4. Construir e Iniciar
Ejecuta el siguiente comando para levantar todo el sistema:

```bash
docker-compose up -d --build
```
> **Nota:** La primera vez puede tardar unos minutos mientras descarga las imágenes de PHP y Nginx, instala las dependencias de Composer y compila el CSS/JS.

---

## 🚀 Acceso a la Aplicación

Una vez que termine el proceso, puedes acceder desde tu navegador:

🔗 **URL:** [http://localhost:8080](http://localhost:8080)

### Comandos Frecuentes

| Tarea | Comando |
| :--- | :--- |
| **Ver estado de los contenedores** | `docker-compose ps` |
| **Ver logs (errores)** | `docker-compose logs -f app` |
| **Detener la aplicación** | `docker-compose down` |
| **Reiniciar la aplicación** | `docker-compose restart` |
| **Entrar a la consola de Laravel** | `docker-compose exec app php artisan [comando]` |

---

## 📂 Estructura del Proyecto

*   `/app`: Lógica del negocio (Controladores, Modelos).
*   `/resources/views`: Vistas de la aplicación (Blade).
*   `/public`: Archivos públicos y assets compilados.
*   `/database`: Migraciones y archivo de base de datos SQLite.
*   `/docker`: Archivos de configuración de Nginx y Scripts de inicio.

---

## 📄 Notas de Manteniemiento

1.  **Persistencia:** La base de datos y las imágenes subidas se guardan en **volúmenes de Docker**. No se pierden al apagar los contenedores.
2.  **Migraciones:** El sistema ejecuta automáticamente `php artisan migrate` al iniciar.
3.  **Permisos:** Los scripts de Docker ajustan automáticamente los permisos de las carpetas `storage` y `bootstrap/cache`.

---
*Desarrollado para UTP - Investigación 2026*
