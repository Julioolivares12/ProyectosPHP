<?php
/**
 * Created by PhpStorm.
 * User: julio
 * Date: 30/10/2017
 * Time: 14:51
 */

include "../modelos/Publicaciones.php";

 if(!isset($_POST['idPublicacion']) && !isset($_POST['txttitulo']) && !isset($_POST['txtdescripcion']) && !isset($_POST['txtcuerpo']) && !isset($_POST['txttipoPublicacion'])){
     header("Location: ../vistas/administrador/index.php");
 }
 else{
     $actualizar = new Publicaciones();

     $id=$_POST['idPublicacion'];
     $titulo=$_POST['txttitulo'];
     $descripcion=$_POST['txtdescripcion'];
     $cuerpo=$_POST['txtcuerpo'];

     $archivo= $_FILES['fileImagen']['name'];
     $destino="../uploads/imagenes/'$archivo'";
     $opcion=$_POST['txttipoPublicacion'];

     if($archivo!=""){
         move_uploaded_file($_FILES['fileImagen'],$destino);
     }
     else{
         $archivo=$_POST['imagenAnterior'];
         $destino="../uploads/imagenes/'$archivo'";
     }

     // ActualizarPublicacion($id,$titulo,$descripcion,$cuerpo,$imagenUrl,$id_tipoPublicacion)
     $resultado=$actualizar->ActualizarPublicacion($id,$titulo,$descripcion,$cuerpo,$archivo,$opcion);
     header("Location: ../vistas/administrador/index.php?'$resultado'");
 }



 if(isset($_GET['eliminar'])){
     $eliminar= new Publicaciones();
     $id=$_GET['eliminar'];
     $resultado = $eliminar->EliminarPublicacion($id);
     header("Location: ../vistas/administrador/index.php?'$resultado'");
 }



