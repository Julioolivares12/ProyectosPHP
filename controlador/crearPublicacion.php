<?php
/**
 * Created by PhpStorm.
 * User: julio
 * Date: 01/11/2017
 * Time: 12:12
 */

if(isset($_POST['txttitulo']) && isset($_POST['txtdescripcion']) && $_POST['txtcuerpo']){
    $id=$_POST['idPublicacion'];
    $titulo=$_POST['txttitulo'];
    $descripcion=$_POST['txtdescripcion'];
    $cuerpo=$_POST['txtcuerpo'];

    $archivo= $_FILES['fileImagen']['name'];
    $destino="../uploads/imagenes/'$archivo'";
    $opcion=$_POST['txttipoPublicacion'];

    $crear= new Publicaciones();

    if ($archivo!=""){
        move_uploaded_file($_FILES['fileImagen']['tmp_name'],$destino);
    }
    else{
        $archivo=$_POST['imagenAnterior'];
        $destino="../uploads/imagenes/'$archivo'";
    }
    $resultado=$crear->crearPublicacion($titulo,$descripcion,$cuerpo,$archivo,$opcion);

    header("Location: ../vistas/administrador/index.php?'$resultado'");
}
else{
    $resultado="formulario vacio";
    header("Location: ../vistas/administrador/index.php?'$resultado'");
}