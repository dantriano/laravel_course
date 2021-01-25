## Tutorial de Laravel

En este proyecto se van desarrollando paso a paso las diferentes funcionalidades de Laravel

## Release 3.0: Formulario nuevo producto

- Añadimos el artributo enctype="multipart/form-data" en el formulario
- Redirigimos el action del furmulario para que ejecute directamente el metodo **save** del Productcontroller
- Para que funcione el paso anterior tenemos que definir el action 'save' asociado a la URL del formulario en el routes/web.app **Route::post('/products/new', 'ProductController@save');** de esta manera al renderizar la view se pondrá la URL vinculada a esa acción
- En el metodo **save** del Productcontroller creamos un nuevo producto para guardarlo a traves del modelo
- En la base de datos guardamos el nombre de la imagen, para ello añadimos una nueva columna al migration con un nuevo archivo de migración
- La imagen la guardamos con **$request->imagen->store('folder')** o **$file->move($destinationPath, $originalFile);**
- Añadimos la foto para que se muestre en la lista de productos

## Release 4.0: Añadir producto y mantener en sesion

- **ProductController.php:** Añadimos el metodo addToChart que carga los productos guardados en sesion **carrito** y añade los productos añadidos por el usuario. Luego redirige a la página que le solicitó el request
- **app.plade.php:** Añadimos en la cabecera una lista de productos obtenidos de la sesion **carrito**.
- Añadimos un botón que se encargará de borrar todos los productos de la session **carrito**

