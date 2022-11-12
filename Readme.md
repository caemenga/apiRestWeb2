#proyecto : api rest para la materia web 2 de la carrera TUDAI.

api rest sencilla para poder utilizar desde phpMyAdmin, con el objetivo de manejar un CRUD de uuna tienda de bebidas.

#como usar : endpoints.
#Tabla de Productos.

obtener todos los productos: http://localhost/web2/TPEapiRest/api/products.
obtener un producto por id: http://localhost/web2/TPEapiRest/api/products/:ID.
borrar producto: http://localhost/web2/TPEapiRest/api/products/:ID.
editar producto: http://localhost/web2/TPEapiRest/api/products/:ID.
agregar producto: http://localhost/web2/TPEapiRest/api/products.

obtener productos ordenados por precio: http://localhost/web2/TPEapiRest/api/products/api/products?orderby=orden.
para obtener los productos ordenados, escribir luego del orderby= "ASC" si se quiere ordenar de manera ascendente, o "DESC" si se quiere de manera descendente. 



paginacion de productos:  http://localhost/web2/TPEapiRest/api/products?page=page&limit=limit.

ingresar en "page" la pagina que se quiere obtener, y en limit la cantidad de productos que se quieren por pagina.

#tabla especificaciones.



obtener todas las especificaciones: http://localhost/web2/TPEapiRest/api/specifications.
obtener un producto por id: http://localhost/web2/TPEapiRest/api/specifications/:ID.
borrar producto: http://localhost/web2/TPEapiRest/api/specifications/:ID.
editar producto: http://localhost/web2/TPEapiRest/api/specifications/:ID.
agregar producto: http://localhost/web2/TPEapiRest/api/specifications.

obtener especificaciones ordenadas por precio: http://localhost/web2/TPEapiRest/api/specifications/api/products?orderby=orden.

mismas indicaciones para el ordenamiento de los productos.

paginacion de las especificaciones:  http://localhost/web2/TPEapiRest/api/products?page=page&limit=limit.

mismas indicaciones que se usan para paginar los productos.

obtener token de autorizacion:   http://localhost/web2/TPEapiRest/api/auth/token.
usar este endpoint para obtener el token, el cual nos va a autorizar a editar, agregar, y eliminar productos y especificaciones.


