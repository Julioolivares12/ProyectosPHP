<?php
session_start();
//require '../modelos/login.php';
require ('../config/conexion.php');
//$login= new login();
$errorMensaje;

       $email=$_POST['txtemail'];
       $pass=$_POST['txtpassword'];

       $alumno="SELECT * FROM alumnos WHERE email='$email' AND pass='$pass'";
       $resultado=mysqli_query($con,$alumno);
       $exite=mysqli_num_rows($resultado);
       if ($exite==0){
           $errorMensaje="error contraseña o email no son validos";
           header("Location: ../vistas/loginView.php?$errorMensaje");

       }
       else{
           $fila=mysqli_fetch_array($resultado);
           $_SESSION['nombre']=$fila['nombre'];
           $_SESSION['imagen']=$fila['imagenUrl'];
           $_SESSION['tipo']=3;
           header("Location: ../vistas/alumno/home.php");
       }


