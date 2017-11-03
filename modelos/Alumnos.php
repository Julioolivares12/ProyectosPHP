<?php
require ("../config/database.php");
 class Alumnos{
     public function __construct()
     {
     }
     //funcion para mostrar el perifil del alumno
     public function perfilALummo($id){
         $db=Database::getInstance()->getDb();
         $query="SELECT * FROM alumnos WHERE id_alumno='$id'";
         $cmd=$db->prepare($query);
         $cmd->execute();

         return $cmd->fetchAll(PDO::FETCH_ASSOC);
     }
     // funncion para actualizar el perfil del alumno
     public function actualizarAlumno($id,$nombre,$apellido,$email,$pass,$imagen){
         $db=DATABASE::getInstance()->getDb();
         $query="UPDATE alumnos SET nombre= :nombre,apellido= :apellido,email= :email,pass= :pass,imagenUrl= :imagen WHERE :id_alumno=:id";
         $cmd=$db->prepare($query);
         $cmd->bindParam(':nombre',$nombre);
         $cmd->bindParam(':apellido',$apellido);
         $cmd->bindParam(':email',$email);
         $cmd->bindParam(':pass',$pass);
         $cmd->bindParam(':imagenUrl',$imagen);
         $cmd->bindParam(':id_alumno',$id);

         $cmd->execute();
         return $mensaje="atualizado con exito";
     }
 }