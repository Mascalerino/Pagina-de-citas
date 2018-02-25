function cerrarSesion () {

   alertify.set({ labels: {
    ok     : "Si",
    cancel : "No"
  } });

  alertify.set({ buttonFocus: "none" }); // "none", "ok", "cancel"

  alertify.confirm("¿Seguro que quieres cerrar sesión?", function (e) {
    if (e) {
      document.location.href = "controladoras/cerrarSesion.php";
    } else {

      return false;
    }
  });

}

function eliminarCita (idCita) {

   alertify.set({ labels: {
    ok     : "Si",
    cancel : "No"
  } });

                                alertify.set({ buttonFocus: "none" }); // "none", "ok", "cancel"

                                alertify.confirm("¿Seguro que quieres eliminar esta cita?", function (e) {
                                  if (e) {
                                    
                                    document.location.href = "controladoras/eliminarCita.php?idCita=" + idCita;
                                    
                                  } else {

                                    return false;
                                  }
                                });

                              }	
