# P4-Practica_2_Parte_1

## Enunciado:

Práctica 2-2: Programación Web

## Organización

Esta práctica se divide en dos partes: una primero de desarrollo de una aplicación web en el lado del servidor usando solo PHP y una segunda que consiste en añadirle programación del lado del cliente. La práctica se realizará en grupos de hasta tres alumnos.

### Descripción general:

Esta práctica consiste en crear una aplicación web que permita la gestiÛn de un restaurante. Específicamente el área de servicio de atención al cliente por camareros y cocina. La aplicaciÛn debe permitir gestionar tres grupos de usuarios: visitante, camarero, cocinero. Los visitantes solo podrán acceder a información pública sobre el restaurante y sus características. Los camareros gestionaran la toma de pedidos y su entrega a los clientes. Los cocineros tomaran las peticiones correspondientes y las elaborarán hasta estar preparadas para ser servidas.

### Casos de uso según usuarios:

#### Visitante:
* Acceder a la información general del Restaurante
* Buscar platos por nombre
* Identificarse como usuario ya registrado

#### Camarero:
* Todos los casos de uso de los visitantes
* Listado de mesas con su estado permitiendo seleccionarla para atenderla.
* Seleccionada una mesa:
* Comenzar una nueva comanda
* Añadir peticiones a una comanda
* Eliminar peticiones de una comanda
* Servir peticiones de una comanda
* Cerrar y cobrar una comanda

### Requisitos:

Como ya se ha dicho. la base de datos a emplear, por su sencillez de configuración y uso, será SQLite accediendo a ella desde PHP empleando PHP Data Objects (PDO) como abstracciÛn de acceso a bases de datos. Ejemplos de manejo de la base de datos SQLite.

#### Tablas empleadas:

Para más detalle ver el código de creación de las tablas en el fichero restaurante.sql. 

```
usuarios

Campo       Descripción
id          Identificador numérico único del usuario
usuario     Nombre de cuenta
clave       Clave del usuario (cifrado con MD5)
nombre      Nombre del usuario
tipo        1 camarero, 2 cocinero

mesas

Campo       Descripción
id          Identificador numérico único de la mesa
nombre      Nombre de la mesa

articulos

Campo       Descripción
id          Identificador numérico único del artículo
nombre      Nombre del articulo
tipo        0 no necesita preparación, 1 necesita preparación
stock       Número de artÌculos disponibles
PVP         Precio de venta al público
 
comandas

Campo               Descripción
id                  Identificador numérico único de la comanda
mesa                Id de la mesa asociada
camareroapertura    Id del camarero creador
horaapertura        Momento de creación 
camarerocierre      Id del camarero que cierra la comanda
horacierre          Momento de cierre de la comanda 
PVP                 Total a pagar

lineascomanda

Campo             Descripción
id                Identificador numérico único de la lÌnea de comanda
comanda           Id de la comanda
articulo          Id del articulo
camareropeticion  Id camarero que toma la peticiÛn 
horapeticion      Momento petición
tipo              0 => no necesita preparación, 1 => necesita preparación de cocinero
cocinero          Id cocinero que elabora el artÌculo
horainicio        Momento de inicio de la elaboraciÛn
horafinalizacion  Momento de fin de la elaboraciÛn 
camareroservicio  Id camarero que sirve el artÌculo
horaservicio      Momento de servir
```

#### Formato de hora

Los diversos campos de las tablas anteriores que almacenan una hora o momento, almacenan este dato en forma de entero. Este entero representa el número de segundos desde el 1 de enero de 1970 (epoch). Para generar este entero y obtener de este la fecha y hora en forma textual se usan las funciones time() y date().

## Parte 1

Como ya se ha indicado la práctica se divide en dos partes. En la primera parte sólo se deben emplear peticiones desde enlaces o desde formularios para realizar las operaciones necesarias para realizar los casos de uso.

## Authors
* **Juan Isern** - *Initial work* - [JuanIsernGhosn](https://github.com/JuanIsernGhosn/)
