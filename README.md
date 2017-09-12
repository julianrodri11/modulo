# MODULO DE GESTIÓN DE USUARIOS

Este módulo permite administrar usuarios perfiles, módulos, opciones, accesos al sistema, copias de seguridad,

## REQUISITOS ANTES DE LA INSTALACIÓN

### SE DEBE TENER INSTALADO
1. un servidor de páginas php, ya sea apache o nginx
2. Un motor de base de datos: MYSQL o POSTGRES SQL
3. Un servidor de correos como mercury 
4. Habilitar extensiones de PDO para postgres

Se recomienda usar xampp, wampp

### Detalles para configurar el servidor de correos mercury
#### Abrir el panel de administración de mercury y hacer los siguientes cambios
  Chequear la opción MercuryC SMTP Relaying client
  * Configuration->Prococol Modules->MercuryC SMTP Relaying client
  Deschequear la opción Do not SMTP relaying of non-local mail
  * Configuration->Mercury SMTP Server-> Connection control->Do not SMTP realying of non-local mail
  Reiniciar el servidor mercury
  Establecer los parámetros envío de correo así
  Configuration-> MercuryC SMTP Relay Client Configuration 
  y colocar los parámetros según su sea gmail o hotmail.com
  
#### Para SMTP cuentas de gmail

  * Smart Host Name: smtp.gmail.com
  * Connection Port/type: 587
  * SSL Encryption via STARTTLS command
  * Login username: < cuenta de gmail >
  * Password: < password de gmail >

#### Datos SMTP Para hotmail.com
  * Smart Host Name: smtp.live.com
  * Connection Port/type: 587
  * SSL Encryption via STARTTLS command
  * Login username: < cuenta de hotmail >
  * Password: < password de hotmail >
  
#### Si se hace uso de otro servidor de correo es necesario investigar el nombre y puerto.

### ¿Cómo habilitar la extensión de pdo para postgres o mysql?
  * Abrir el archivo de configuración de php, el cual se encuentra en el siguiente directorio
    * C:\xampp\php\php.ini

  * Dentro de ese archivo buscar la sección de extensiones y descomenta las siguientes lineas quitando el ;
    * extension=php_pdo_pgsql.dll
    * extension=php_pgsql.dll
    * extension=php_pdo_mysql.dll
    * Ahora guardar los cambios realizados en el archivo: php.ini y reiniciar servidor apache 

# INSTALACIÓN DEL MÓDULO

1. Ubicarse en el directorio c-> xampp -> htdocs
2. Clonar el repositorio git clone https://github.com/julianrodri11/modulo.git
3. Abrir el asistente de instalación ubicado en c -> xampp -htdocs -> modulo ->asistente.php y seguir las instrucciones según el motor seleccionado

#### Nota
* Las base de datos para postgres se encuentra ubicado en: modulo -> autogenerado-> bd_postgres
* Las base de datos para mysql se encuentra ubicado en: modulo -> autogenerado-> bd_mysql

Una vez realizado la instalación correctamente eliminar la carpeta modulo-> autogenerado 

#FUNCIONALIDADES
  * Permite crear usuarios para autenticación
  * Permite recuperar la contraseña en caso de perdida
  * Permite bloquear al usuario si realiza más de 4 intentos
  * Permite gestionar las contraseñas de los usuarios a través de un token de recuperación
  * Permite administrar si un usuario puede o no ingresar al sistema
  * Permite agregar funcionalides a los usuarios dependiendo del perfil
  * Permite realizar copias de seguridad de la base de datos 
  * Permite actualizar los datos del usuario, perfiles, modulos, opciones, 
  * Permite la busqueda de información por varias columnas
 
#Tecnologías usadas.
  * PHP
  * PDO Libreria de php
  * MVC
  * Matarializecss 
  * Postgres
  * Mysql
  * Jquery
  * Responsive Web Design 
  * Ajax
  * JavaScript
  * SQL Standar
  * Xampp
  * Servidor de correos Mercury
  

# El orden manejo para crear funciones es el siguiente:

  * CREAR USUARIO ADMIN     
  * CREAR USUARIO ESTANDAR 
  * CREAR PERFIL 
  * LUEGO CREAR MODULO
  * CREAR OPCIONES
  * ASOCIAR UNA OPCIÓN A UN PERFIL 
  * INICIAR SESIÓN CON UN USUARIO ESTANDAR 
  

