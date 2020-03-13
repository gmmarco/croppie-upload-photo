jQuery(document).ready(function(){

    $(".FotoFile").click(function(){
        console.log("Abriri Dialogo ...");
        $("#ModalFotografiaArchivo").modal({
                                    show:true,
                                    backdrop: 'static',
                                    keyboard: true
                                });
        $(".modal-title").html("Seleccionar Fotografia Desde un Archivo");
    })


    $('#ModalFotografiaArchivo').on('hidden.bs.modal', function () {
      $(".btnGroup-select-photo").removeAttr("disabled");

      //Limpiamos los controles una vez cerrada la ventana modal
      $(".img-foto-fotografia-cropped").attr("src","images/sin-fotografia.jpg");
      $(".detalles-fotografia-frente").html("");
      $("#BtnCropPhotoFile").attr("disabled","disabled");
      reinicializa_croppie_contanier();
    });


    //Instrucciones para Croppie
    $("#BtnCropPhotoFile").attr("disabled","disabled");

    var $uploadCrop,tempFilename,rawImg,imageName;

    $uploadCrop = $("#PhotoFileSelected").croppie({
        enableExif: true,
        showZoomer: true,
        viewport: {
           width: 200,
           height: 260
        },
        boundary: {
            width: 300,
            height: 300
        },
        enforceBoundary: false,
    });

    $("#fileFotografiaFrente").on("change", function () {
        var input_file_name = $(this)[0].name;
        imageName = "."+input_file_name.replace(/_/g,"-");

        $("#BtnCropPhotoFile").removeAttr("disabled");

        readFile(this);
    });


    
    $('#BtnCropPhotoFile').on("click", function (ev) {
        $uploadCrop.croppie("result", {
            type: 'base64',
            format: 'jpeg',
            backgroundColor:'#FFF',
            quality:1,
            size: {width: 200, height: 260} //Estilo Pasaporte
        }).then(function (FotoFrenteRecortada) {
            var sizeBits = FotoFrenteRecortada.length;
            var sizeKB = sizeBits/1000;
            var sizeMB = sizeBits/1000000;
            var xImagen = FotoFrenteRecortada;

            $(".detalles-fotografia-frente").html("");
            $(".detalles-fotografia-frente").append("<li><strong>Tamaño:</strong> "+sizeKB.toFixed(2)+" KB</li>");
            $(".detalles-fotografia-frente").append("<li><strong>Tamaño:</strong> "+sizeMB.toFixed(2)+" MB</li>");
            $(".detalles-fotografia-frente").append("<li><strong>Ancho:</strong> 200px</li>");
            $(".detalles-fotografia-frente").append("<li><strong>Alto:</strong> 260px</li>");
            $(".detalles-fotografia-frente").append("<li><strong>Formato:</strong> jpg</li>");           
            
            /*Asignamos la Fotografia en la imagen correspondiente*/
            $(".img-foto-fotografia-cropped, .img-fotografia-preview").attr('src', xImagen);        

            /*#####################################################################################*/
            /*Guardar Via Ajax la Fotografia seleccionada*/
            $.ajax({
                url: "uploads/ajx_upload_photo.php",
                type: "POST",
                data: {"xImagen":xImagen},
                dataType: "JSON",
                success: function (respuesta) {
                    if (respuesta.uploaded) {
                      console.log("Fotografia guardada correctamente");  
                    }           
                },
                error: function(jqXHR, status, error) {
                   console.log(jqXHR);
                   console.log(status);
                   console.log(error);
                }
            });/*Fin de Ajax*/
            /*#####################################################################################*/


        });
    });


    function readFile(input) {
        if (input.files && input.files[0]) {
                /*Verificamos que solo sean imagenes*/
                if (input.files[0].type==='image/png' || input.files[0].type==='image/jpeg') {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        rawImg = e.target.result;

                        $uploadCrop.croppie("bind", {
                            url: rawImg
                        }).then(function(){
                            console.log("jQuery bind complete");
                        });
                    }

                    /*Con esta comparacion evitamos el error cuando se cancela la seleccion dela imagen*/
                    if (input.files[0] !== undefined) {
                        reader.readAsDataURL(input.files[0]);
                    }
            }else{
                mensaje('fa-info-circle', '¡Formato no Válido!', 'Solo se permiten Archivos de Imagen con extensión .png y .jpeg', 'danger');
            }
        }else {
            console.log("El usuario canceló la selección de la Fotografía o el navegador no soporta la FileReader API");
        }
    }

}); //cierra Jquery


function reinicializa_croppie_contanier(){
    $('#PhotoFileSelected').removeClass('ready');
    $("#PhotoFileSelected").html("");
    $uploadCrop=null

    $uploadCrop = $('#PhotoFileSelected').croppie({
        enableExif: true,
        showZoomer: true,
        viewport: {
           width: 200,
           height: 260
        },
        boundary: {
            width: 300,
            height: 300
        },
        enforceBoundary: false,
    });
}