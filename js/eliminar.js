//Ventana de alerta, antes de eliminar un registro en la pagina de administrador

function eliminar(id, producto, tabla) {
    Swal.fire({ // Se le da la configuración al Sweet Alert
        title: 'Realmente quieres eliminar ' +producto+ ' de la tabla '+tabla+' ?',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: `Eliminar`,
        denyButtonText: `No eliminar`,
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.replace("eliminar.php?id=" + id + "&tabla=" + tabla, "eliminando");
        } else if (result.isDenied) {
        }
    });
}
