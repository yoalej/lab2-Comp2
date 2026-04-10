# Lab 2 - Computo 2  
## Alejandro Ernesto Chicas Martinez
## Gerson Asael Chica Lovos
**Registro de Estudiantes - Laboratorio de Redes**


## Respuestas a las preguntas

**¿De qué forma manejaste el login de usuarios?**  
El login se maneja en `validar.php` con datos guardados en la tabla `usuarios`. Cuando el correo y la contraseña coinciden, se crea una sesión PHP con `session_start()` y `$_SESSION['usuario']`. Después solo se permite el acceso a `principal.php` si la sesión existe. Se hizo con el correo para que se vea mas unico y menos posibilidades de que se repita el usuario facilmente.

**¿Por qué es necesario para las aplicaciones web utilizar bases de datos en lugar de variables?**  
Porque las variables de PHP solo existen mientras se ejecuta la página. Una base de datos guarda los datos de forma persistente, permite consultarlos después de cerrar el navegador y compartidos entre varios usuarios para ver todo lo que esta y queda gardado si son datos que necesitamos.

**¿En qué casos sería mejor utilizar bases de datos para su solución y en cuáles utilizar otro tipo de datos temporales como cookies o sesiones?**  
- Base de datos: cuando se necesita guardar usuarios, registros o información que debe mantenerse a largo plazo y ser accesible desde varias páginas o por distintos usuarios.  
- Cookies/sesiones: cuando la información es temporal, como el estado de login activo, preferencias de vista, o datos de navegación durante una sesión.

**Describe brevemente tus tablas y los tipos de datos utilizados en cada campo**  
- El archivo `lab2-comp2.sql` contiene la estructura real de las tablas usadas en el proyecto.  
- **usuarios**:  
  - `id` INT(11) AUTO_INCREMENT PRIMARY KEY — identificador único del usuario.  
  - `nombre` VARCHAR(100) NOT NULL — nombre completo del usuario.  
  - `correo` VARCHAR(100) NOT NULL UNIQUE — correo para login y evitar duplicados.  
  - `password` VARCHAR(255) NOT NULL — contraseña guardada como hash.  
- **estudiantes**:  
  - `id` INT(11) AUTO_INCREMENT PRIMARY KEY — identificador único del estudiante.  
  - `nombre` VARCHAR(100) NOT NULL — nombre completo del estudiante.  
  - `carnet` VARCHAR(20) NOT NULL UNIQUE — carnet escolar, único por estudiante.  
  - `carrera` VARCHAR(80) NOT NULL — nombre de la carrera.  
  - `edad` INT(11) NOT NULL — edad del estudiante.  
  - `fecha_registro` DATETIME DEFAULT current_timestamp() — fecha y hora de ingreso del registro.

Justificación: INT se usa para números y claves, VARCHAR para texto variable con límite de tamaño, UNIQUE para evitar duplicados en campos que deben ser únicos, y DATETIME para almacenar cuándo se registró cada estudiante con precisión. El SQL del archivo confirma esta estructura.

## Usuario de prueba
- Correo: `admin@lab2.com`  
- Contraseña: `Lab2026`
