# Política de Seguridad y Registro de Actualización

## Actualización Crítica de Seguridad - PHP 8.3

Este proyecto fue auditado y actualizado para mitigar vulnerabilidades críticas en el entorno de ejecución PHP y servidores web asociados (XAMPP / Apache).

### 1. Vulnerabilidades Mitigadas

* **CVE-2024-4577 (CVSS 9.8 - Crítica): Inyección de argumentos en PHP CGI (RCE)**
  * **Descripción:** Vulnerabilidad en Windows que permite la ejecución remota de código arbitrario sin autenticación mediante el mapeo de caracteres "Best-Fit" cuando Apache expone el alias CGI (`/php-cgi/`).
  * **Solución aplicada:** Actualización a PHP 8.3.36 (versión parcheada) y desactivación de la directiva `ScriptAlias /php-cgi/` en Apache.
* **CVE-2024-5458 (CVSS 8.1):** Omisión de filtros en `FILTER_VALIDATE_IP`.
* **CVE-2024-5585 (CVSS 7.5):** Vulnerabilidad en `proc_open` en entornos Windows.
* **CVE-2024-8926 / CVE-2024-8927 (CVSS 7.5):** Denegación de servicio en análisis de peticiones multipartes.

### 2. Requisitos del Entorno

* **PHP:** Versión `>= 8.2.20` o `>= 8.3.8` (se recomienda **PHP 8.3.36+**).
* **Servidor Web:** Apache / Nginx configurado sin exposición de `php-cgi`.
* **Hardening en php.ini:**
  * `expose_php = Off`
  * `display_errors = Off` (en entornos productivos)

### 3. Recomendaciones para Despliegue

1. Mantener `APP_DEBUG=false` y `APP_ENV=production` en producción.
2. Servir la aplicación apuntando la raíz web exclusivamente al directorio `public/`.
3. Renovar claves de entorno con `php artisan key:generate`.
