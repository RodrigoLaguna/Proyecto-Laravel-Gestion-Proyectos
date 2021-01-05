/*=============================================
Preguntar antes de Eliminar Registro
=============================================*/
import Swal from 'sweetalert2/dist/sweetalert2.js'
import 'sweetalert2/src/sweetalert2.scss'

$('#btneliminar').click(function () {
    Swal.fire("Hola");
});



$(document).on("click", ".eliminarRegistro", function(){

    var action = $(this).attr("action");
    var method = $(this).attr("method");
    var pagina = $(this).attr("pagina");
    // var token = $(this).children("[name='_token']").attr("value");
    var token = $(this).attr("token");


    swal({
        title: '¿Está seguro de eliminar este registro?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, eliminar registro!'
    }).then(function(result){

        if(result.value){

            var datos = new FormData();
            datos.append("_method", method);
            datos.append("_token", token);

            $.ajax({

                url: action,
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                success:function(respuesta){

                    if(respuesta == "ok"){

                        swal({
                            type:"success",
                            title: "¡El registro ha sido eliminado!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"

                        }).then(function(result){

                            if(result.value){

                                window.location = ruta+'/'+pagina;

                            }


                        })

                    }

                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error(textStatus + " " + errorThrown);
                }

            })

        }

    })

})
