function eliminar(id, producto, tabla) {
    Swal.fire({
        title: 'Realmente quieres eliminar ' +producto+ ' de la tabla '+tabla+' ?',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: `Eliminar`,
        denyButtonText: `No eliminar`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            window.location.replace("eliminar.php?id=" + id + "&tabla=" + tabla, "eliminando");
        } else if (result.isDenied) {
            // Swal.fire('No se ha eliminado', '', 'info')
        }
    });
}
