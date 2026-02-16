//Constante url//
const base_url = "http://localhost/proyectoseguridad/";

function eliminarUsuario(id) {

    Swal.fire({
        title: "¿Esta Seguro de Eliminar Este Usuario?",
        text: "¡Si Elimina Este Usuario No Podra Recuperarlo!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        confirmButtonText: "¡Si, Eliminelo!"
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = base_url + 'usuarios/usuarios/' + id;
        }
    });
}

function eliminarAmbiente(id) {
    //Constante url//
    const base_url = "http://localhost/proyectoseguridad/";
    Swal.fire({
        title: "¿Esta Seguro de Eliminar Este Ambiente?",
        text: "¡Si Elimina Este Ambiente No Podra Recuperarlo!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        confirmButtonText: "¡Si, Eliminelo!"
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = base_url + 'ambientes/listarambientes/' + id;
        }
    });
}

