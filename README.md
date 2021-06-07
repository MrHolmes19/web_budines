# El rincon de los budines

<p align="center"> <img src="https://github.com/MrHolmes19/web_budines/blob/master/imagenes/logo.png?raw=true" width="150" align="center"> </p>

**Indice de la documentación**

- [El rincon de los budines](#el-rincon-de-los-budines)
    + [Resumen del proyecto](#resumen-del-proyecto)
      - [Autores](#autores)
      - [Tecnologías utilizadas](#tecnolog-as-utilizadas)
      - [Criterio de diseño](#criterio-de-dise-o)
    + [Modulo de pedido de budines](#modulo-de-pedido-de-budines)
      - [Estructura visual](#estructura-visual)
      - [Vista previa](#vista-previa)
      - [Opciones de pago](#opciones-de-pago)
      - [Impresion de comprobante](#impresion-de-comprobante)
    + [Modulo de administrador](#modulo-de-administrador)
      - [Estructura visual](#estructura-visual-1)
    + [Estructuracion del codigo y archivos](#estructuracion-del-codigo-y-archivos)
      - [Carpeta CSS](#carpeta-css)
      - [Carpeta js](#carpeta-js)
      - [Carpeta php](#carpeta-php)
        * [Subcarpeta admin](#subcarpeta-admin)
        * [Subcarpeta paginasPedido](#subcarpeta-paginaspedido)
      - [Carpeta vendor](#carpeta-vendor)

### Resumen del proyecto

El Rincon de los Budines es una aplicación web para pedir budines, la cual parte de una página principal tipo "One Page" y contiene además un módulo de administrador que permite gestionar las variables del proceso de pedido (nombre de productos, foto, precio, etc.) así como descargar la base de datos de pedidos realizados. 

--------------------------------------------------------------------
[**ACCEDER A LA APLICACION**](https://web-budines.herokuapp.com/)
--------------------------------------------------------------------

#### Autores
- Leandro Márquez (lnmarquez19@gmail.com)
- Hernan Monsalvo (monsalvo.h@gmail.com)

#### Tecnologías utilizadas
La parte Front-end de todo el proyecto se ha realizado con HTML, CSS y Javascript puro. Para la parte lógica o Back-end se ha utilizado PHP y algunas librerías específicas.

#### Criterio de diseño
Esta aplicación web fue pensado "First mobile" para el módulo de pedido y "first desktop" para el módulo de administrador, aunque ambas son "responsive designed"

![](https://github.com/MrHolmes19/web_budines/blob/master/imagenes/indexDesktop.png?raw=true) <img src="https://github.com/MrHolmes19/web_budines/blob/master/imagenes/readme/indexMobile.png?raw=true" width="200">


### Modulo de pedido de budines

Este módulo permite realizar un pedido personalizado del producto. Se accede al mismo desde la página principal, presionando el botón "Hace tu pedido", que figura en el encabezado. [**ACCEDER AL MODULO PEDIDOS**](https://web-budines.herokuapp.com/php/paginasPedido/login.php)

<img src="https://github.com/MrHolmes19/web_budines/blob/master/imagenes/readme/AccesoPedidos.png?raw=true" width="800">

#### Estructura visual

<img src="https://github.com/MrHolmes19/web_budines/blob/master/imagenes/readme/Ventana_Inicio.png?raw=true" width="800">

El módulo de pedido de budines consta de las siguientes etapas (O páginas), resumidas en un menú:

| Páginas  | Función |
| ------------- | ------------- |
| Login  | Pide al usuario que introduzca su nombre |
| Forma  | Consulta al usuario la presentación de su budín (Rectangular o circular) |
| sabor  | Permite al usuario que elija un solo sabor de la lista, y tiene la opción de mostrar una vista previa con información de cada uno (foto y descripción)  |
| Agregados  | Permite al usuario elegir agregados extra para el relleno del budín. La cantidad es limitada y depende del sabor del budín elegido previamente. También cuenta con vista previa.  |
| Cobertura  | Permite al usuario elegir una cobertura sobre el budín. Solo se permita una, aunque algunos sabores no lo permiten y saltean este paso. También cuenta con vista previa |
| Resumen del pedido  | Muestra al usuario el resumen de su elección, asi como el precio total, y da la posibilidad de pedir más de 1 unidad.   |
| Formulario de datos  | Solicita al usuario información para realizar el envío: Que fecha lo requiere, cual es la dirección de entrega, con que medios de pago desea abonar (incorpora mercado pago), y un campo de comentarios para expresarse libremente.  |
| Ventana despedida  | Agradece la compra y permite al usuario volver al inicio para pedir otro budín, volver a la pagina principal o descargar su comprobante de compra. |

En todo momento el usuario puede, desde el menú, volver a cualquier página hacia atrás para modificar su elección. Solo puede ir hacia adelante si previamente completó los pasos intermedios.

#### Vista previa

En las secciones de selección de sabores, agregados y coberturas, es posible ver una vista previa de los productos y seleccionarlos desde allí:

<img src="https://github.com/MrHolmes19/web_budines/blob/master/imagenes/readme/vistaPrevia.png?raw=true" width="600"> <img src="https://github.com/MrHolmes19/web_budines/blob/master/imagenes/readme/vistaPreviaMobile.png?raw=true" width="210">

#### Opciones de pago

En la sección de "Datos", es posible elegir 3 formas de pago distintas: Efectivo, transferencia bancaria o mercado pago.

<img src="https://github.com/MrHolmes19/web_budines/blob/master/imagenes/readme/Ventana_formulario.png?raw=true" width="800">

Al seleccionar mercado pago, la aplicacion redirige al módulo de pago de esta plataforma.

<img src="https://github.com/MrHolmes19/web_budines/blob/master/imagenes/readme/Ventana_mercadopago.png?raw=true" width="800">


#### Impresion de comprobante

En la ventana de despedida, tras seleccionar la opcion correspondinte, es posible obtener un comprobante de compra.

<img src="https://github.com/MrHolmes19/web_budines/blob/master/imagenes/readme/ventana_despedida.png?raw=true" width="800">

El mismo se imprime en pdf y se abre automáticamente

<img src="https://github.com/MrHolmes19/web_budines/blob/master/imagenes/readme/pdf_comprobante.png?raw=true" width="800">


### Modulo de administrador

Este módulo, de uso exclusivo para el propietario del sitio, permite gestionar la información que se muestra en el módulo de pedido, como asi tambien sacar reportes. 
Se accede al mismo desde la página principal, yendo hacia abajo de todo y presionando el botón "Ingresar como administrador" (Las credenciales de ingreso aparecen completas por defecto).

<img src="https://github.com/MrHolmes19/web_budines/blob/master/imagenes/readme/accesoAdmin.png?raw=true" width="500">

#### Estructura visual

Este módulo tiene una pantalla principal que permite seleccionar cualquiera de las siguientes tablas:

+ Sabores de budín
+ Agregados extra
+ Coberturas
+ Pedidos

Al final de cada fila de cada tabla hay 2 iconos, que permiten ya sea editar la información o eliminar el registro completo.

<img src="https://github.com/MrHolmes19/web_budines/blob/master/imagenes/readme/admin_boton_editar.png?raw=true" width="800">

Además, en función de la tabla elegida, aparecen botones con distintas opciones, a saber:

+ Generar reporte Pdf
+ Generar reporte en Excel
+ Agregar línea
+ Modificar

<img src="https://github.com/MrHolmes19/web_budines/blob/master/imagenes/readme/administrador_pedidos.png?raw=true" width="800">


Las opciones de agregar o modificar, permiten interactuar con los atributos del producto: nombre, precio y foto. En el caso particular de "Sabor" permite adicionalmente indicar cantidad de agregados permitidos, si admite cobertura y si está disponible.

<img src="https://github.com/MrHolmes19/web_budines/blob/master/imagenes/readme/edicionAdministrador.png?raw=true" width="800">


### Estructuracion del codigo y archivos

El código está organizado de la siguiente manera:

#### Carpeta CSS

| Archivo  | Funcionalidad |
| -------------: | ------------- |
| administrador_tablas.css:  | Pide al usuario que introduzca su nombre |
| animaciones.css:  | Contiene el código para las distintas animaciones (Menú administrador, botones de vista previa, ventana de despedida) |
| bodyBudines.css:  | Contiene el estilo del cuerpo de cada página del módulo de pedido |
| estiloPDF_pedidos.css  | Estilo del pdf que se puede imprimir desde el botón “reporte en pdf” desde el módulo de administrador. |
| footerBudines.css:   | Contiene las flechas y el pie de página de cada página del módulo de pedido |
| headerBudines.css: | Contiene el estilo del menú de cada página del módulo de pedido |
| index_style.css: | Contiene el estilo de la página principal |
| estiloGestorImg.css: | Estilos de archivos.php, que es el gestor de imágenes dentro de administracion |


#### Carpeta js

| Archivo  | Funcionalidad |
| -------------: | ------------- |
| contador.js:  | Contiene la lógica de suma y resta de cantidad de budines en la pagina "total.php". Además redirecciona a guarda_eleccion.php enviándole la cantidad y precio total para que lo almacene |
| eliminar.js:  | Configuración de la ventana de alerta, que aparece luego de intentar eliminar un registro, desde la ventana de administrador |
| fechas.js:  | Contiene la lógica para establecer fecha mínima y máxima de entrega en la página formulario.php |
| flechaAtras.js:  | Obtiene la ruta a donde se tiene que dirigir luego de pulsar el botón de volver, en cualquier de las paginas de Pedido. Se centralizó en este archivo para simplificar código, al no replicarlo en cada página y hacerlo más fácilmente mantenible |
| footer.js:  | Modifica el texto del copyright ajustándolo según el ancho de la pantalla del dispositivo |
| Index.js:  | Da funcionalidad al menú tipo hamburguesa de la página principal (index.php), permitiendo: 1) desplazar la pantalla al cliquear sobre él o sobre alguno de los enlaces, 2) manteniendo el encabezado fijo al scrollear |
| Jquery-3.5.1.min.js:  | Se descarga esta versión de Jquery, para tenerlo fijo |
| listaDesplegable.js:  | Envía la selección de la lista desplegable, en el menú de administrador, para que posteriormente cargue la tabla correspondiente a esa selección |
| menu.js:  | Da funcionalidad al menú del modulo de pedido, logrando que 1) se desplace la pantalla mostrando u ocultando las opciones, 2) eliminando el estilo de hamburguesa cuando el tamaño de pantalla es de escritorio. Utiliza JQuery |
| nMax.php:  | Lógica para desactivar las opciones check de la página de Agregados, luego de haber seleccionado el límite máximo permitido. Utiliza JQuery  |
| NoCobertura.php:  | Idem anterior, pero para las opciones de la página cobertura, cuando el tipo de budín no lo permite. Utiliza JQuery |
| popup.js:  | Otorga la funcionalidad de la ventana emergente, tras presionar el botón de vista previa en las paginas de Sabor, Agregados y Cobertura. 1) Abrir ventana emergente y mostrar datos. 2) Cerrar la ventana al presionar en cualquier lado. 3) Seleccionar el ítem desde esta ventana |
| radioB_editar.js:  | Es llamada desde editar.php (Modulo administrador). Configura la selección de radiobuttons según la info de cada registro (Disponibilidad de budín y cobertura) |
| radioB_editarPedido.js:  | Es llamada desde editarPedido. Idem anterior pero para la selección de estado de entrega |
| sweetalert2.js:  | Librería para ventana emergente de alerta |
| Tabla_a_excel.js:  | Codigo que permite exportar una tabla de Excel con la información de los pedidos. |


#### Carpeta php

| Archivo  | Funcionalidad |
| -------------: | ------------- |
|conexion.php:  | Módulo de conexión a Base de datos. Contiene conexión tanto a BBDD local (en etapa de prueba) como a BBDD remota (Producción) |


##### Subcarpeta admin

| Archivo  | Funcionalidad |
| -------------: | ------------- |
| administrador.php:  | Pagina principal del menú administrador. Contiene una tabla dinámica, que varía en función de la selección del menú desplegable. Además, contiene botones con funcionalidades |
| agregarProducto.php:  | descripcion |
| archivos.php:  | Toma los valores tipeados por el administrador y los guarda en la base de datos en el registro del nuevo producto |
| contador.php:  | Contiene la pantalla de administración de fotos y su lógica. (Se accede desde el botón que esta en el menú de administrador). La lógica es la de buscar y mostrar el nombre de las fotos subidas en la carpeta del servidor, y por otro lado las que están cargadas en la base de datos. Permite compararlas para hallar las fotos que están en uso y las que están en desuso, asignando un botón para eliminarlas |
| contenidoPedidoPDF.php:  | Es una plantilla para posterior impresión en PDF, que toma los datos del pedido seleccionado. Se utiliza para cargar la información en el reporte PDF desde el administrador y en el comprobante de pedido al final del proceso de pedido del budín |
| contenidoTablaPDF.php:  | Idem anterior, pero para el listado completo de pedidos |
| edicion.php:  | Idem a "agregarProducto", pero en lugar de agregar en la BBDD, modifica los valores existentes (Tablas de productos) |
| edicionPedido.php:  | Idem a "agregarProducto", pero en lugar de agregar en la BBDD, modifica los valores existentes (Tablas de pedidos) |
| editar.php:  | Módulo que aparece al pulsar en "editar" en la interfaz de administrador. Trae los valores existentes del producto, permite seleccionar cobertura y disponibilidad, y cambiar la imagen. Incorpora vista previa de dicha imagen |
| editarPedido.php:  | Idem "editar.php" pero trae la info de la base de datos de "pedidos"|
| eliminar.php:  | Comando que elimina registro de la tabla. Se activa a través del botón eliminar |
| imprimirPedidoPDF.php:  | Comando para la creación del reporte pdf del pedido individual, tomando la plantilla "contenidoPedidoPDF.php" y utilizando la librería Dompdf |
| imprimirTablaPDF.php:  | Comando para la creación del reporte pdf de todos los pedidos, tomando la plantilla "contenidoTablaPDF.php" y utilizando la librería Dompdf |
| limpiarImagenes.php:  | Comando para eliminar las imagenes no utilizadas en los productos |
| login.php:  | Habilitación de ingreso al menu administrador, comparando usuario y contraseña, utilizando un cifrado de seguridad. Ademas contiene el comando de deslogueo |
| metodos.php:  | Trae la fila de una tabla en función de su ID. A esta función se la llama desde varios archivos |
| nuevoProducto.php:  | Interfaz para la creacion de un nuevo producto. Es idéntico a editar.php, pero no autocompleto los campos por ser un producto nuevo |
| toast.php:  | Componente del toast (ventana emergente), incluye los estilos embebidos |

##### Subcarpeta paginasPedido

| Archivo  | Funcionalidad |
| -------------: | ------------- |
| agregados.php:  | Interfaz de la pagina "agregados" |
| cobertura.php:  | Interfaz de la pagina "cobertura" |
| despedida.php:  | Interfaz de la pagina "despedida" |
| forma.php:  | Interfaz de la pagina "forma" |
| formulario.php:  | Interfaz de la pagina "formulario" |
| login.php:  | Interfaz de la pagina "login" |
| navbar.php:  | Pedazo de interfaz o componente de la barra de navegación (Incluye menu hamburguesa) |
| sabor.php:  | Interfaz de la pagina "sabor" |
| total.php:  | Interfaz de la pagina "total" |
| btnMercadoPago.php:  | Codigo que llama a la API de Mercado Pago al pulsar el boton siguiente,  previamente habiendo elegido la opción "Pagar con Mercado Pago". En este código se acciona el botón que "pagar" que viene por defecto con la API, desde el botón Siguiente de la pagina "Formulario" |
| enviarPedido.php:  | Código para guardar datos del pedido a la BBDD y enviar notificación e-mail |
| guarda_eleccion.php:  | Administra la persistencia de datos (guarda información del usuario), y redirige (rutea) según lógica del proceso de selección (Si el budín permite o no agregados, si lleva cobertura, etc) |
| traerPrecio.php:  | Código para traer los precios de los items elegidos por el usuario, y que aparecerán en la página "total" |


#### Carpeta vendor 

Se almacenan aquí, todas las librerías que usamos

| Carpeta/archivo  | Funcionalidad |
| -------------: | ------------- |
| Composer:  | Gestor de librerias |
| MercadoPago:  | Carpeta de MercadoPago para realizar el pago de los budines |
| Resto de las carpetas:  | Interfaz de la pagina "despedida" |
| Autoload.php:  | archivo mediador o integrador, útil para consultar librerías|
