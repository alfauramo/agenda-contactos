<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Basic Project Template</h1>
    <br>
</p>


INSTALACIÓN
------------

### Instalar vía Composer

Si no tienes [Composer](http://getcomposer.org/), deberás instalarlo siguiendo las instrucciones de  [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

Una vez instalado Composer, tendrás que ejecutar

~~~
composer install
~~~

Si te da algún problema, ejecuta 

~~~
composer install --ignore-platform-reqs
~~~


CONFIGURACIÓN
-------------

### Database

En la carpeta documentación hay un fichero llamado bd_copy.sql

Deberás crear una base de datos llamada contactos e importar el fichero que he dicho anteriormente.

### Host

Por lo general suelo utilizar hosts, y este caso no es una excepción.

El host se llama contactos.loc y apunta a 

~~~
your-app-folder/agenda-contactos/web
~~~

### Usuario

No podrás utilizar la aplicación sin el usuario. 

Como se puede observar, la contraseña viene encriptada.

El email del usuario es *alfredo@pruebas.com* y la contraseña es *pruebas*
