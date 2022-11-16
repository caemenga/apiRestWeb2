#proyecto# : api rest para la materia web 2 de la carrera TUDAI.

api rest sencilla para poder utilizar con base de datos en phpMyadmin, con el objetivo de manejar un CRUD de una tienda de bebidas.
------------------------------------------------------------------------------------------
**como usar : endpoints.**
**Tabla de Productos.**

La tabla productos cuenta con las siguientes columnas : producto y marca.

**obtener todos los productos:** con metodo GET: http://localhost/web2/TPEapiRest/api/products

**obtener un producto por id:** con metodo GET: http://localhost/web2/TPEapiRest/api/products/:ID.

**borrar producto:** con metodo DELETE http://localhost/web2/TPEapiRest/api/products/:ID.

**editar producto:** con metodo PUT http://localhost/web2/TPEapiRest/api/products/:ID.

**agregar producto:** con metodo POST http://localhost/web2/TPEapiRest/api/products.

------------------------------------------------------------------------------------------
**obtener productos ordenados por marca:** con metodo GET: http://localhost/web2/TPEapiRest/api/products?orderby=orden.

Para obtener los productos ordenados, escribir luego del orderby= "ASC" si se quiere ordenar de manera ascendente, o "DESC" si se quiere de manera descendente. 

Un ejemplo http://localhost/web2/TPEapiRest/api/products?orderby=DESC.
------------------------------------------------------------------------------------------
**Paginacion de productos:** con metodo GET:  http://localhost/web2/TPEapiRest/api/products?page=page&limit=limit.

ingresar en "page" la pagina que se quiere obtener, y en limit la cantidad de productos que se quieren por pagina.

Un ejemplo:  http://localhost/web2/TPEapiRest/api/products?page=3&limit=4, para obtener la pagina 3, con un limite de 4 productos para cada pagina.
-----------------------------------------------------------------------------------------
**filtrado de productos por alguno de sus campos:** Con metodo GET.

http://localhost/web2/TPEapiRest/api/products?filter=columna&value=valor

Ingrese en filter el nombre de la columna por la que quiere filtrar, y en value el valor que quiere recibir.
------------------------------------------------------------------------------------------
**Ordenamiento asc o desc de los productos por alguno de sus campos**
Con metodo GET:

http://localhost/web2/TPEapiRest/api/products?filter=campo&orderby=desc/asc.

------------------------------------------------------------------------------------------
**tabla especificaciones.**

La tabla especificaciones cuenta con las siguientes columnas : tipo, descripcion, y precio.

**obtener todas las especificaciones:** Con Metodo GET http://localhost/web2/TPEapiRest/api/specifications.

**obtener una especificacion por id:**Con Metodo GET: http://localhost/web2/TPEapiRest/api/specifications/:ID.

**borrar especificacion:**Con Metodo DELETE: http://localhost/web2/TPEapiRest/api/specifications/:ID.

**editar especificacion:**Con Metodo PUT: http://localhost/web2/TPEapiRest/api/specifications/:ID.

**agregar especificacion:**Con Metodo POST: http://localhost/web2/TPEapiRest/api/specifications.

----------------------------------------------------------------------------------------
**obtener especificaciones ordenadas por precio:** Con Metodo GET http://localhost/web2/TPEapiRest/api/specifications?orderby=asc/desc.

mismas indicaciones para el ordenamiento de los productos.

------------------------------------------------------------------------------------------
**paginacion de las especificaciones:** Con Metodo GET  http://localhost/web2/TPEapiRest/api/specifications?page=page&limit=limit.

mismas indicaciones que se usan para paginar los productos.

Un ejemplo: http://localhost/web2/TPEapiRest/api/specifications?page=3&limit=2, para obtener la 3 pagina, ordenando las especificaciones de a 2

-----------------------------------------------------------------------------------------

**filtrado de productos por alguno de sus campos:** Con Metodo GET

http://localhost/web2/TPEapiRest/api/specifications?filter=columna&value=valor

Ingrese en filter el nombre de la columna por la que quiere filtrar, y en value el valor que quiere recibir.
Por ejemplo para filtrar por la columa **tipo** y el valor sea **ipa** escribir el siguiente endpoint http://localhost/web2/TPEapiRest/api/products?filter=tipo&value=ipa


-----------------------------------------------------------------------------------------

**usar este endpoint para obtener el token, el cual nos va a autorizar a editar, agregar, y eliminar productos y especificaciones.**

Con Metodo GET.

obtener token de autorizacion:   http://localhost/web2/TPEapiRest/api/auth/token.

----------------------------------------------------------------------------

**JSON QUE SE PUEDEN USAR PARA LAS PRUEBAS**
producto- Para hacer post, no agregar id_producto.

{
    "id_producto": 25,
    "producto": "vino",
    "marca": "septima",
    "id_especificacion_fk": 3
}


especificacion-Para el post no agregar id_especificacion.



{
    "id_especificacion": 4,
    "tipo": "espumante",
    "descripcion": "rica cerveza roja",
    "precio": 400
}
