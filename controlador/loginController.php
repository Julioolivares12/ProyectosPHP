<?php
require '../modelos/login.php';
$login= new login();
$errorMensaje;
   if (!isset($_POST['txtemail']) && !isset($_POST['txtpassword'])){
       $email=$_POST['txtemail'];
       $pass=$_POST['txtpassword'];

       $id=$login->login($email,$pass);
       if ($id){
           header("Location: ../vistas/alumno/home.php");
       }
       else{
           $errorMensaje="error contraseña o email no son validos";
           header("Location: ../vistas/loginView.php?$errorMensaje");
       }
   }
   else{
       $errorMensaje="campos vacios";
       header("Location: ../vistas/loginView.php?$errorMensaje");
   }

?>