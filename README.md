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

## Release 5.0: Gestionar Excepciones

- **ProductController.php** Englobamos las acciones de subir archivo e insertar product dentro de un try catch que gestionará los dos posibles errores que se pueden producir: archivo no añadido y fallo al insertar en base de datos. Cada uno de ellos con su propio catch: **UploadFileException** y **\Illuminate\Database\QueryException** (o \PDOException)

- **Providers\UploadFileProvider** nos permite utilizar el servicio de **UploadFileService** en cualquier lugar de nuestra aplicación

- **config\app.php** añadimos el provedor **App\Providers\UploadFileProvider::class**

- **Services\UploadFileService** establece las acciones necesarias para subir un archivo. Definiendolo como servicio puede utilizarse en todos los controladores gracias a que se ha vinculado con el provider **Providers\UploadFileProvider** y de esta manera se podrá utilizar con tan solo declararlo en el __constructor (u otro metodo) de cualquier controllador

- **Exceptions\UploadFileException** clase especifica para tratar todos los errores sobre la subida de archivos. Por ejemplo mensajes personalizados o acciones alternativas

- **view\new_product.php** añadimos el mensaje de error que nos proporciona el controlador a traves de session

- **Exceptions\Handler** Por el Handler pasan todas las excepciones, por lo que podriamos definir acciones determinadas al lanzarse una excepción. Por ejemplo: **if ($exception instanceof \Illuminate\Database\QueryException)...**
