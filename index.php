<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Cargar Fotos con Croppie</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="subject" content="">
    <meta name="author" content="">
    <meta name="copyright" content="">
    <meta name="robots" content="noindex, nofollow">
    <meta name="classification" content="Private">
    <meta name="reply-to" content="">
    <meta name="googlebot" content="noindex, nofollow">
    <link rel="icon" href="favicon.ico">

    <link href="plugins/bootstrap-3.3.7/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" media="screen" href="plugins/font-awesome-4.7.0/css/font-awesome.min.css">

    <script src="plugins/jquery/jquery-3.4.1.min.js"></script>
    <script src="plugins/bootstrap-3.3.7/js/bootstrap.min.js"></script>

    <link href="plugins/croppie/croppie.css" rel="stylesheet">
    <script src="plugins/croppie/croppie.js" type="text/javascript"></script>

    <link rel="stylesheet" type="text/css" href="css/index.css">
    <script src="js/upload_fotos.js" type="text/javascript"></script>
  </head>
  <body>
    <div class="row">
      <div class="col-md-offset-3 col-md-6" style="margin-top: 20px;">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">
            <i class="fa fa-drivers-license-o fa-lg"></i>&nbsp; <span class="titulo-panel">Agregar Fotografia</span>
            </h3>
          </div>
          <div class="panel-body text-center">
            <img class="img-responsive img-thumbnail img-fotografia-preview" src="images/sin-fotografia.jpg">
            <p>
              <button type="button" class="btn btn-primary btn-lg FotoFile" style="margin-top:10px;">
              <i class="fa fa-upload"></i>&nbsp; Cargar Fotografia
              </button>
            </p>
          </div>
          <div class="panel-footer">
            <h4>Cargar Fotografias con <a href="http://foliotek.github.io/Croppie/" title="">Croppie</a></h4>
          </div>
        </div>        
      </div>
    </div>   

    <div class="modal fade" id="ModalFotografiaArchivo" tabindex="-1" role="dialog" data-backdrop="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header alert-info">
            <h4><i class="fa fa-camera"></i>&nbsp; <span class="modal-title"></span></h4>
          </div>
          <div class="modal-body">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="row" style="min-height: 350px;">
                  <div class="col-md-6">
                    <div class="profile-img-container">
                      <img class="img-responsive img-thumbnail img-foto-fotografia-cropped" src="images/sin-fotografia.jpg" />
                      <br>
                    <ul class="detalles-fotografia-frente text-left" style="color:#888;"></ul>
                  </div>
                </div>
                <div class="col-md-6">
                  <div id="PhotoFileSelected" class="center-block"></div>
                  <div style="margin: 0px auto;position:relative;left:4px;text-align: center;width: 220px;">
                    <span style="top: -50px;">Ajuste el centro de la fotografía</span>
                    <br>
                    <div style="margin: 0px auto;position:relative;margin-top:5px;width: 240px;">
                      <label class="btn btn-success btn-file btn-block">
                        <i class="fa fa-camera"></i>&nbsp; Seleccionar Fotografía
                        <input type="file" accept="image/*" class="item-img file center-block" style="display: none;" id="fileFotografiaFrente" name="fileFotografiaFrente"/>
                      </label>
                    </div>
                    <button type="button" id="BtnCropPhotoFile" class="btn btn-primary btn-block" style="margin-top:10px; width: 240px;">
                      <i class="fa fa-cut fa-lg" style="margin-right: 20px;margin-bottom: 4px;"></i>
                      Recortar Fotografía
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer alert-info">
          <div class="pull-left text-danger loading" style="display: none;">
            <i class="fa fa-spinner fa-lg fa-pulse"></i>&nbsp; <span class="">Guardando ...</span>
          </div>
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times-circle fa-lg"></i>&nbsp; Cerrar Ventana</button>
        </div>
      </div>
    </div>
  </div>
</body>
</html>