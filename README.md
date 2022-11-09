# :shield: Sistema Con Autenticacion Mediante OpenLDAP :shield:

Proyecto de implementacion de autenticacion OpenLdap en php

Este proyecto tiene como finalidad la implementacion del proceso de autenticacion del usuario en php con OpenLdap

## Getting Started

Estas instrucciones permitirán obtener una copia del proyecto en funcionamiento en su máquina local para propósitos de desarrollo y pruebas.

### Prerrequisitos

Para poder ejecutar este proyecto es necesario tener instalado en su maquina lo siguiente:

* PHP >= 7.0
* OpenLdap
* XAMPP


### Instalación

Para poder instalar este proyecto es necesario seguir los siguientes pasos

* clonar repositorio
* Copiar archivo ldap.php en /xampp/htdocs
* Abrir con editor de texto el archivo php.ini ubicado en la siguiente ruta
```
.../xampp/php/php.ini
```
* Quitar comentarios linea 923
```
extension=ldap
```



