<?php
session_start();
/**
 * Created by PhpStorm.
 * User: julio
 * Date: 01/11/2017
 * Time: 19:38
 */

  require ("../config/conexion.php");

  if(isset($_POST['nombre'])&& isset($_POST['apellido']) && isset($_POST['email'])&& isset($_POST['password'])){
      //$crearCuenta = new Login();
      $nombre=$_POST['nombre'];
      $apellido=$_POST['apellido'];
      $email=$_POST['email'];
      $pass=$_POST['password'];
      $archivo=$_FILES['imagenUsu']['name'];
      //$destino=$_FILES['imagenUsu']['name'];
      $existeC="select * from alumnos where email='$email'";
      $existe=mysqli_query($con,$existeC);

      $existeE=mysqli_num_rows($existe);
      

      $destino="../uploads/imagenes/".$archivo;
      if ($_FILES['imagenUsu']['error']!=0){
         // move_uploaded_file($_FILES['imagenUsu']['tmp_name'],"../uploads/imagenes/".$_FILES['imagenUsu']['name']);
         //copy($_FILES['imagenUsu']['tmp_name'],"../imagenes/".$_FILES['imagenUsu']['name']);
         move_uploaded_file($_FILES['imagenUsu']['tmp_name'],"../imagenes/".$_FILES['imagenUsu']['name']);
      }
      else{
         $errorMensaje="no puedo subir la foto";
         header("Location: ../vistas/registro.php?'$errorMensaje'");
      }
      //$resul=$crearCuenta->CrearUsuario($nombre,$apellido,$email,$pass,$destino);
      $query="INSERT INTO alumnos (nombre,apellido,email,pass,imagenUrl)
      VALUES ('$nombre','$apellido','$email','$pass','$destino')";
      $ejecuta=mysqli_query($con,$query);
     // $resul=mysqli_num_rows($ejecuta);

      $select="SELECT * FROM alumnos where email='$email' AND pass='$pass'";
      $resultado2=mysqli_query($con,$select);
      $fila=mysqli_fetch_array($resultado2);
      $_SESSION['nombre']=$fila['nombre'];
      $_SESSION['tipo']=3;
      $_SESSION['imagen']=$fila['imagenUrl'];
      $_SESSION['id']=$fila['id_alumno'];
      //if ($resul>0){
          header("Location: ../vistas/alumno/home.php");
     // }
    //  else{
         // header("Location: ../vistas/registro.php?'$error'");
    //  }
  }
  else{
      $errorMensaje="campos vacios";
      header("Location: ../vistas/registro.php?'$errorMensaje'");
  }