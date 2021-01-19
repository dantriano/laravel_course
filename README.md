## Tutorial de Laravel

En este proyecto se van desarrollando paso a paso las diferentes funcionalidades de Laravel

## Formulario nuevo producto

- Añadimos el artributo enctype="multipart/form-data" en el formulario
- Redirigimos el action para que ejecute el metodo **create** del Productcontroller
- Para que funcione el paso anterior tenemos que definir el action create en el routes/web.app
- En el metodo **create** del Productcontroller creamos un nuevo producto para guardarlo a traves del modelo
- En la base de datos guardamos el nombre de la imagen, para ello añadimos una nueva columna al migration
- La imagen la guardamos con **$request->imagen->store('folder')** o **$file->move($destinationPath, $originalFile);**
- Añadimos la foto para que se muestre en la lista de productos