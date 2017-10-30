<?php
require '../modelos/login.php';
$login= new login();
$errorMensaje;
   if (!empty($_POST[loginform])){
       $email=$_POST['txtemail'];
       $pass=$_POST['txtpassword'];

       $id=$login->login($email,$pass);
       if ($id){
           header("Location:alumno/home.php");
       }
       else{
           $errorMensaje="error contraseña o email no son validos";
           header("Location:login.php?$errorMensaje");
       }
   }
   else{
       $errorMensaje="campos vacios";
       header("Location: ../vistas/loginView.php?$errorMensaje");
   }

?>