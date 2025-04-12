function confirmarEliminar() {
    let respuesta = "Realmente desea eliminar";
    if (confirm(respuesta) == true) {
        location.href ="read.php";
    }
}

function confirmarSalir() {
    let respuesta = "Realmente desea salir";
    if (confirm(respuesta) == true) {
        location.href ="#";
    }
}