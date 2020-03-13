 <?php 
	session_start();
	$croped_image = $_POST['xImagen'];

	if(!isset($croped_image)){
		$ajax_respuesta["error"] = "NoData";
		echo json_encode($ajax_respuesta);
	}else{
		try {
			/*Cada directorio sera generado con el UUID Generado*/
			$ruta_directorio = "fotografias/";

			list($type, $croped_image) = explode(';', $croped_image);
			list(, $croped_image)      = explode(',', $croped_image);

			$croped_image = base64_decode($croped_image);
			$image_name = rand(5, 99).'.jpg';

			/*Verificamos si el directorio Existe*/
			if (!is_dir($ruta_directorio)) {
				mkdir($ruta_directorio);
				file_put_contents($ruta_directorio."/".$image_name, $croped_image);
			}else{
				file_put_contents($ruta_directorio."/".$image_name, $croped_image);
			}

			$ajax_respuesta["uploaded"] = true;
			$ajax_respuesta["imagen"] = $image_name;
		} catch (Exception $e) {
			$ajax_respuesta["uploaded"] = false;
			$ajax_respuesta["error"] = $e->getMessage();
		}

		echo json_encode($ajax_respuesta);
	}

?>