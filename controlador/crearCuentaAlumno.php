<?php
/**
 * Created by PhpStorm.
 * User: julio
 * Date: 01/11/2017
 * Time: 19:38
 */

  require ("../config/conexion.php");

  if(isset($_POST['nombre'])&& isset($_POST['apellido']) && isset($_POST['email'])&& isset($_POST['password'])){
      $crearCuenta = new Login();
      $nombre=$_POST['nombre'];
      $apellido=$_POST['apellido'];
      $email=$_POST['email'];
      $pass=$_POST['password'];
      $archivo=$_FILES['imagenUsu'];
      $destino=$_FILES['imagenUsu']['name'];
      $destino="../uploads/imagenes/'$archivo'";
      if ($_FILES['imagenUsu']!=""){
          move_uploaded_file($_FILES['tmp_name'],$destino);
      }
      $resul=$crearCuenta->CrearUsuario($nombre,$apellido,$email,$pass,$destino);
      if ($resul){
          header("Location: ../vistas/alumno/home.php");
      }
      else{
          header("Location: ../vistas/registro.php?'$error'");
      }
  }else{
      $errorMensaje="campos vacios";
      header("Location: ../vistas/registro.php?'$errorMensaje'");
  }