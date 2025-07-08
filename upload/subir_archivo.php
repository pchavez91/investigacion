<?php

$accion   = $_REQUEST['accion'];

if($accion=='adjuntos'){

if (isset($_FILES['archivo'])) {
    $archivo = $_FILES['archivo'];
    $extension = pathinfo($archivo['name'], PATHINFO_EXTENSION);
	$file =      pathinfo($archivo['name'], PATHINFO_FILENAME); 
	$time = time();
    $nombre = "{$file}_$time.$extension";
    if (move_uploaded_file($archivo['tmp_name'], "archivos_subidos/$nombre")) {
        echo $nombre;
    } else {
        echo 0;
    }
}

}

if($accion=='adjuntos_ser_dir'){

if (isset($_FILES['archivo_ser_dir'])) {
    $archivo = $_FILES['archivo_ser_dir'];
    $extension = pathinfo($archivo['name'], PATHINFO_EXTENSION);
	$file =      pathinfo($archivo['name'], PATHINFO_FILENAME); 
	$time = time();
    $nombre = "{$file}_$time.$extension";
    if (move_uploaded_file($archivo['tmp_name'], "archivos_subidos/$nombre")) {
        echo $nombre;
    } else {
        echo 0;
    }
}

}

if($accion=='adjuntos_ser_dir_hh'){

if (isset($_FILES['archivo_ser_dir_hh'])) {
    $archivo = $_FILES['archivo_ser_dir_hh'];
    $extension = pathinfo($archivo['name'], PATHINFO_EXTENSION);
	$file =      pathinfo($archivo['name'], PATHINFO_FILENAME); 
	$time = time();
    $nombre = "{$file}_$time.$extension";
    if (move_uploaded_file($archivo['tmp_name'], "archivos_subidos/$nombre")) {
        echo $nombre;
    } else {
        echo 0;
    }
}

}


?>
