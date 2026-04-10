# Lab 2 - Computo 2  
**Registro de Estudiantes - Laboratorio de Redes**

## Respuestas a las preguntas

**¿De qué forma manejaste el login de usuarios?**  
El login se maneja en `validar.php` con datos guardados en la tabla `usuarios`. Cuando el correo y la contraseña coinciden, se crea una sesión PHP con `session_start()` y `$_SESSION['usuario']`. Después solo se permite el acceso a `principal.php` si la sesión existe.

**¿Por qué es necesario para las aplicaciones web utilizar bases de datos en lugar de variables?**  
Porque las variables de PHP solo existen mientras se ejecuta la página. Una base de datos guarda los datos de forma persistente, permite consultarlos después de cerrar el navegador y compartidos entre varios usuarios.

**¿En qué casos sería mejor utilizar bases de datos para su solución y en cuáles utilizar otro tipo de datos temporales como cookies o sesiones?**  
- Base de datos: cuando se necesita guardar usuarios, registros o información que debe mantenerse a largo plazo y ser accesible desde varias páginas o por distintos usuarios.  
- Cookies/sesiones: cuando la información es temporal, como el estado de login activo, preferencias de vista, o datos de navegación durante una sesión.

**Describe brevemente tus tablas y los tipos de datos utilizados en cada campo**  
- **usuarios**:  
  - `id` INT AUTO_INCREMENT PRIMARY KEY — identificador único.  
  - `nombre` VARCHAR(100) — nombre del usuario.  
  - `correo` VARCHAR(150) UNIQUE — correo para login y evitar duplicados.  
  - `password` VARCHAR(255) — hash de la contraseña.  
  - `creado` DATETIME — fecha de registro del usuario.  
- **estudiantes**:  
  - `id` INT AUTO_INCREMENT PRIMARY KEY — identificador único.  
  - `nombre` VARCHAR(100) — nombre completo del estudiante.  
  - `carnet` VARCHAR(30) UNIQUE — carnet escolar, único por estudiante.  
  - `carrera` VARCHAR(100) — nombre de la carrera.  
  - `edad` INT — edad del estudiante.  
  - `fecha_registro` DATETIME — fecha automática del registro.

Justificación: uso INT para números y llaves, VARCHAR para texto variable, UNIQUE para evitar duplicados, y DATETIME para guardar cuándo se ingresaron los datos.

## Usuario de prueba
- Correo: `admin@lab2.com`  
- Contraseña: `Lab2026`

¡Proyecto listo para evaluación!