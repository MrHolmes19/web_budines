# El rincon de los budines

<p align="center"> <img src="https://github.com/MrHolmes19/web_puddings/blob/master/imagenes/logo.png?raw=true" width="150" align="center"> </p>

**Documentation index**

- [El rincon de los budines](#el-rincon-de-los-budines)
    + [Project summary](#resumen-del-proyecto)
      - [Authors](#autores)
      - [Technologies used](#tecnolog-as-utilizadas)
      - [Design criteria](#criterio-de-dise-o)
    + [Puddings order module](#modulo-de-pedido-de-budines)
      - [Layout](#estructura-visual)
      - [Preview](#vista-previa)
      - [Payment options](#opciones-de-pago)
      - [Print receipt](#impresion-de-comprobante)
    + [Admin dashboard](#modulo-de-administrador)
      - [Layout](#estructura-visual-1)
    + [Estructuracion del codigo y archivos](#estructuracion-del-codigo-y-archivos)
      - [Styles folder (CSS)](#carpeta-css)
      - [Interaction folder (JS)](#carpeta-js)
      - [Logic folder (PHP)](#carpeta-php)
        * [admin subfolder](#subcarpeta-admin)
        * [order pages subfolder](#subcarpeta-paginaspedido)
      - [vendor folder](#carpeta-vendor)

### Resumen del proyecto

El Rincon de los Budines is a web application for ordering puddings, which starts from a "One Page" main page and also contains an administrator module that allows you to manage the variables of the ordering process (name of products, photo, price, etc.) as well as download the database of orders placed.
--------------------------------------------------------------------
[**ACCESS THE APPLICATION**](https://web-budines.herokuapp.com/)   (momentaneously down)
--------------------------------------------------------------------

#### Authors
- Leandro Marquez (lnmarquez19@gmail.com)
-Hernan Monsalvo (monsalvo.h@hotmail.com)

#### Used technology
The Front-end part of the whole project has been made with HTML, CSS and pure Javascript. For the logical part or Back-end, PHP and some specific libraries have been used.

#### Design criteria
This web application was designed "First mobile" for the order module and "first desktop" for the administrator module, although both are "responsive designed"

![](https://github.com/MrHolmes19/web_budines/blob/master/imagenes/indexDesktop.png?raw=true) <img src="https://github.com/MrHolmes19/web_budines/blob/master/imagenes/readme/indexMobile.png?raw=true" width="200">


### Pudding order module

This module allows you to place a custom order for the product. It is accessed from the main page, by pressing the "Place your order" button, which appears in the header. [**ACCESS THE ORDERS MODULE**](https://web-budines.herokuapp.com/php/paginasPedido/login.php)

<img src="https://github.com/MrHolmes19/web_puddings/blob/master/imagenes/readme/AccesoPedidos.png?raw=true" width="800">

#### Visual structure

<img src="https://github.com/MrHolmes19/web_budines/blob/master/imagenes/readme/Ventana_Inicio.png?raw=true" width="800">

The pudding order module consists of the following stages (or pages), summarized in a menu:

| Pages | Function |
| ------------- | ------------- |
| login | Asks the user to enter her name |
| Shape | Ask the user the presentation of his pudding (Rectangular or circular) |
| taste | Allows the user to choose a single flavor from the list, and has the option to show a preview with information for each one (photo and description) |
| Aggregates | Allows the user to choose extra additions for the pudding filling. The quantity is limited and depends on the flavor of the previously chosen pudding. It also has a preview. |
| Coverage | Allows the user to choose a topping on the pudding. Only one is allowed, although some flavors do not allow it and skip this step. Also features preview |
| Order Summary | It shows the user the summary of his choice, as well as the total price, and gives the possibility of ordering more than 1 unit. |
| Data form | It asks the user for information to make the shipment: What date is required, what is the delivery address, what means of payment do you want to pay with (incorporates payment market), and a comment field to express yourself freely. |
| Fired window | It thanks the purchase and allows the user to return to the beginning to order another pudding, return to the main page or download their proof of purchase. |

At any time the user can, from the menu, go back to any page to modify his choice. You can only go forward if you have previously completed the intermediate steps.

#### Preview

In the sections for selecting flavors, aggregates and toppings, it is possible to see a preview of the products and select them from there:

<img src="https://github.com/MrHolmes19/web_budines/blob/master/imagenes/readme/vistaPrevia.png?raw=true" width="600"> <img src="https://github.com/MrHolmes19/web_budines/blob/master/imagenes/readme/vistaPreviaMobile.png?raw=true" width="210">

#### Payment options

In the "Data" section, it is possible to choose 3 different forms of payment: Cash, bank transfer or market payment.

<img src="https://github.com/MrHolmes19/web_budines/blob/master/imagenes/readme/Ventana_formulario.png?raw=true" width="800">

When selecting payment market, the application redirects to the payment module of this platform.

<img src="https://github.com/MrHolmes19/web_budines/blob/master/imagenes/readme/Ventana_mercadopago.png?raw=true" width="800">


#### Print receipt

In the farewell window, after selecting the corresponding option, it is possible to obtain a proof of purchase.

<img src="https://github.com/MrHolmes19/web_budines/blob/master/imagenes/readme/ventana_despedida.png?raw=true" width="800">

It is printed in pdf and opens automatically

<img src="https://github.com/MrHolmes19/web_budines/blob/master/imagenes/readme/pdf_comprobante.png?raw=true" width="800">


### Admin module

This module, for the exclusive use of the site owner, allows managing the information displayed in the order module, as well as getting reports.
It is accessed from the main page, by going to the bottom of everything and pressing the "Login as administrator" button (Login credentials appear complete by default).

<img src="https://github.com/MrHolmes19/web_budines/blob/master/imagenes/readme/accesoAdmin.png?raw=true" width="500">

#### Layout

This module has a main screen that allows you to select any of the following tables:

+ Pudding flavors
+ extra additions
+ Coverage
+ Orders

At the end of each row of each table there are 2 icons, which allow you to either edit the information or delete the entire record.

<img src="https://github.com/MrHolmes19/web_budines/blob/master/imagenes/readme/admin_boton_editar.png?raw=true" width="800">

In addition, depending on the chosen table, buttons with different options appear, namely:

+ Generate Pdf report
+ Generate report in Excel
+ add line
+ modify

<img src="https://github.com/MrHolmes19/web_budines/blob/master/imagenes/readme/administrador_pedidos.png?raw=true" width="800">


The options to add or modify, allow you to interact with the attributes of the product: name, price and photo. In the particular case of "Flavor" it also allows the indication of the quantity of aggregates allowed, if it admits coverage and if it is available.

<img src="https://github.com/MrHolmes19/web_budines/blob/master/imagenes/readme/edicionAdministrador.png?raw=true" width="800">


### Structuring the code and files

The code is organized as follows:

#### CSS Folder

| Archive | Functionality |
| -------------: | ------------- |
| administrador_tablas.css: | Asks the user to enter her name |
| animaciones.css: | Contains the code for the different animations (Administrator menu, preview buttons, goodbye window) |
| bodyBudines.css: | Contains the style of the body of each page of the order module |
| estiloPDF_pedidos.css | PDF style that can be printed from the "pdf report" button from the administrator module. |
| footerBudines.css: | Contains the arrows and the footer of each page of the order module |
| headerBudines.css: | Contains the style of the menu for each page of the order module |
| index_style.css: | Contains the style of the main page |
| estiloGestorImg.css: | File styles.php, which is the image manager within administration |


#### js folder

| File | Functionality |
| -------------: | ------------- |
| contador.js: | Contains the logic for adding and subtracting the amount of puddings in the "total.php" page. It also redirects to guarda_eleccion.php sending the amount and total price to store it |
| eliminar.js: | Configuring the alert window, which appears after trying to delete a record, from the administrator window |
| fechas.js: | Contains the logic to set the minimum and maximum delivery date in the form page.php |
| flechaAtras.js: | Obtains the route where you have to go after clicking the return button, in any of the Order pages. Centralized in this file to simplify code by not replicating it on every page and making it more easily maintainable |
| footer.js: | Modifies the copyright text by adjusting it according to the width of the device screen |
| Index.js: | Gives functionality to the hamburger menu of the main page (index.php), allowing: 1) to scroll the screen when clicking on it or on any of the links, 2) keeping the header fixed when scrolling |
| jquery-3.5.1.min.js: | This version of Jquery is downloaded, to have it fixed |
| listaDesplegable.js: | Send the selection from the drop-down list, in the administrator menu, so that it can later load the table corresponding to that selection |
| menu.js: | Gives functionality to the order module menu, making it 1) scroll the screen showing or hiding the options, 2) removing the hamburger style when the screen size is desktop. Use JQuery |
| nMax.php: | Logic to deactivate the check options of the Aggregates page, after having selected the maximum limit allowed. Use JQuery |
| NoCobertura.php: | Idem above, but for the coverage page options, when the type of pudding does not allow it. Use JQuery |
| popup.js: | Grants the functionality of the popup window, after pressing the preview button on the Flavor, Added and Topping pages. 1) Open popup window and show data. 2) Close the window by pressing anywhere. 3) Select the item from this window |
| radioB_editar.js: | It is called from edit.php (administrator module). Configure the selection of radiobuttons according to the information of each record (Availability of pudding and coverage) |
| radioB_editarPedido.js: | It is called from editOrder. Idem above but for the selection of delivery status |
| sweetalert2.js: | Alert Popup Library |
| Tabla_a_excel.js: | Code that allows exporting an Excel table with order information. |


#### php folder

| File | Functionality |
| -------------: | ------------- |
|conexion.php: | Database connection module. Contains connection to both local databases (in test stage) and remote databases (Production) |


##### admin subfolder

| File | Functionality |
| -------------: | ------------- |
| administrador.php: | Main page of the administrator menu. Contains a pivot table, which varies based on the dropdown selection. In addition, it contains buttons with functionalities |
| agregarProducto.php: | description |
| archivos.php: | Takes the values typed by the administrator and saves them to the database in the new product record |
| contador.php: | Contains the photo management screen and its logic. (It is accessed from the button that is in the administrator menu). The logic is to search and show the name of the photos uploaded in the server folder, and on the other hand those that are uploaded in the database. Allows you to compare them to find the photos that are in use and those that are not in use, assigning a button to delete them |
| contenidoPedidoPDF.php: | It is a template for subsequent printing in PDF, which takes the data of the selected order. It is used to load the information in the PDF report from the administrator and in the order slip at the end of the pudding order process |
| contenidoTablaPDF.php: | Idem above, but for the complete list of orders |
| edicion.php: | Idem to "agregarProducto", but instead of adding to the database, it modifies the existing values (Product tables) |
| editarPedido.php: | Idem to "agregarProducto", but instead of adding to the database, modify the existing values (order tables) |
| editar.php: | Module that appears when clicking on "edit" in the administrator interface. Brings the existing values of the product, allows you to select coverage and availability, and change the image. Includes preview of said image |
| editarPedido.php: | Idem "edit.php" but brings the info from the "orders" database |
| eliminar.php: | Command that removes a record from the table. It is activated through the delete button |
| imprimirPedidoPDF.php: | Command for the creation of the pdf report of the individual order, taking the template "contenidoPedidoPDF.php" and using the Dompdf |
| imprimirTablaPDF.php: | Command to create the pdf report of all orders, taking the template "contenidoTablaPDF.php" and using the Dompdf |
| limpiarImagenes.php: | Command to remove unused images in products |
| login.php: | Enabling entry to the administrator menu, comparing username and password, using security encryption. It also contains the logon command |
| metodos.php: | Gets the row from a table based on its ID. This function is called from multiple files |
| nuevoProducto.php: | Interface for the creation of a new product. It is identical to edit.php, but it does not autocomplete the fields because it is a new product |
| toast.php: | Toast (popup) component, includes embedded styles |

##### Subcarpeta paginasPedido

| Archivo  | Funcionalidad |
| -------------: | ------------- |
| agregados.php:  | interface of "agregados" |
| cobertura.php:  | interface of "cobertura" |
| despedida.php:  | interface of "despedida" |
| forma.php:  | interface of "forma" |
| formulario.php:  | interface of "formulario" |
| login.php:  | interface of "login" |
| navbar.php:  | Piece of interface or navigation bar component (Include hamburguer menu) |
| sabor.php:  | interface of "sabor" |
| total.php:  | interface of "total" |
| btnMercadoPago.php: | Code that calls the Mercado Pago API by pressing the next button, having previously chosen the option "Pay with Mercado Pago". In this code, the "pay" button that comes by default with the API is activated, from the Next button of the "Form" page |
| enviarPedido.php:  | Code to save order data to the database and send e-mail notification |
| guarda_eleccion.php:  | Manages data persistence (saves user information), and redirects (routes) according to the logic of the selection process (whether or not the pudding allows additions, if it has coverage, etc.) |
| traerPrecio.php:  | Code to bring the prices of the items chosen by the user, and that will appear on the "total" page |


#### Vendor Folder

All the libraries we use are stored here

| Folder/file | Functionality |
| -------------: | ------------- |
| Composer: | Library manager |
| MercadoPago: | MercadoPago folder to make the payment of the puddings |
| Rest of the folders: | "farewell" page interface |
| autoload.php: | mediator or integrator file, useful for consulting libraries |
