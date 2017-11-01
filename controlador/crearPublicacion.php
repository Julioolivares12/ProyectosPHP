<?php
/**
 * Created by PhpStorm.
 * User: julio
 * Date: 01/11/2017
 * Time: 12:12
 */
require ('../config/conexion.php');

if(isset($_POST['txttitulo']) && isset($_POST['txtdescripcion']) && $_POST['txtcuerpo']){

    $titulo=$_POST['txttitulo'];
    $descripcion=$_POST['txtdescripcion'];
    $cuerpo=$_POST['txtcuerpo'];

    $archivo= $_FILES['imagenNueva']['name'];
    $destino="../uploads/imagenes/'$archivo'";
    $opcion=$_POST['txttipoPublicacion'];

    //$crear= new Publicaciones();

    if ($archivo!=""){
        move_uploaded_file($_FILES['imagenNueva']['tmp_name'],$destino);
    }
    //public function crearPublicacion($titulo,$descripcion,$cuerpo,$imagenUrl,$id_administrador,$id_tipoPublicacion)
    //$resultado=$crear->crearPublicacion($titulo,$descripcion,$cuerpo,$archivo,1,$opcion);
    $query="insert into publicaciones (titulo,descripcion,cuerpo,imagenUrl,id_administrador,id_tipoPublicacion) values ('$titulo','$descripcion',$cuerpo,'$destino','1','$opcion')";
    $re=mysqli_query($con,$query);
    if (mysqli_num_rows($re)>0){
        $resultado="registro insertado con exito";
        mysqli_close($con);
        header("Location: ../vistas/administrador/index.php?'$resultado'");
    }
    else{
        $resultado="no se pudo insertar";
        header("Location: ../vistas/administrador/index.php?'$resultado'");

    }
}
else{
    $resultado="formulario vacio";
    header("Location: ../vistas/administrador/index.php?'$resultado'");
}