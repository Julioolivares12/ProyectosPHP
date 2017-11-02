<?php
/**
 * Created by PhpStorm.
 * User: julio
 * Date: 29/10/2017
 * Time: 19:05
 */
require '../config/Database.php';
class Login{
    public function __construct()
    {
        // contructor vacio
    }
   public function login($email,$password){
       //consulta para realizar login
       $consulta = "SELECT * from alumnos where email ='$email' and pass = '$password'";
       try{
           $comando = DATABASE::getInstance()->getDb()->prepare($consulta);
           // ejecuta la sentencia preparada
           $comando->execute();
           $count= $comando->rowCount();
           $data = $comando->fetch(PDO::FETCH_ASSOC);
           if ($count){
               $_SESSION['id_alumno']=$data->id_alumno;
               $_SESSION['urlImagen']=$data->urlImagen;
               $_SESSION['nombre']=$data->nombre;
               $_SESSION['tipo']=$data->id_tipo;
               return true;
           }

       }
       catch (PDOException $exception){
           return false;
       }
   }
   public function CrearUsuario($nombre,$apellido,$email,$pass,$imagenUrl){
       $comprubaEmail="select * from alumnos where email='$email' ";
       try{
           $com=DATABASE::getInstance()->getDb()->prepare($comprubaEmail);

           $com->execute();
           $count=$com->rowCount();
           if($count<1){
               $insertar = DATABASE::getInstance()->getDb()->prepare("insert into alumnos(nombre,apellido,email,pass,imagenUrl,id_tipo) VALUES ('$nombre','$apellido','$email','$pass','$imagenUrl')");
               $insertar->execute();
               $id=DATABASE::getInstance()->getDb()->lastInsertId();
               $_SESSION['id_alumno']=$id;
               $_SESSION['urlImagen']=$imagenUrl;
               $_SESSION['nombre']=$nombre;
               $_SESSION['tipo']=3;
               return true;
           }
           else{
               return false;
           }
       }
       catch (PDOException $exception){

       }
   }
   public static function obtenerAlumno($id){
       try{
           $db=DATABASE::getInstance()->getDb();
           $cmd=$db->prepare("select * from alumnos where id_alumno='$id'");
           $cmd->execute();
           $data=$cmd->fetch(PDO::FETCH_ASSOC);
           return $data;
       }
       catch (PDOException $exception){

       }

   }
}