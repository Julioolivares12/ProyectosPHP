<?php
require ("../config/database.php");
   class Inscripciones{
       public function __construct()
       {
       }
       public function Registro($id_materia,$id_alumno,$id_aula){
           $db=DATABASE::getInstance()->getDb();
           $sql="INSERT INTO inscripciones (id_materia,id_alumno,id_aula)VALUE ('$id_materia','$id_alumno','$id_aula') ";
           try{
               $cmd=$db->prepare($sql);
               $cmd->execute();
               $mensaje="registro insertado con exito";
               return $mensaje;
           }
          catch (PDOException $exception){
              $mensaje="error".$cmd->errorInfo();
              return $mensaje;
          }
       }
       public function mostrarInscripcionesAll($id){
           $db=DATABASE::getInstance()->getDb();

           $sql="SELECT * FROM  inscripciones inner join materias on materias.id_materia=inscripciones.id_materia INNER JOIN aulas on aulas.id_aula=inscripciones.id_aula INNER  JOIN alumnos on alumnos.id_alumno=inscripciones.id_alumno WHERE alumnos.id_alumno='$id' ";
           try{
               $cmd=$db->prepare($sql);
               $cmd->execute();
               $mensaje="insertado con exito";
           }catch (PDOException $exception){
               $mensaje="no se pudo registrar".$exception->getMessage();
           }
       }
   }
