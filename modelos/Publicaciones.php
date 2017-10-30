<?php
    require '../config/database.php';
  class Publicaciones{

      public function __construct()
      {

      }
      public function crearPublicacion($titulo,$descripcion,$cuerpo,$imagenUrl,$id_administrador,$id_tipoPublicacion){
          $db=DATABASE::getInstance()->getDb();
          $query="insert into publicaciones ('titulo','descripcion','cuerpo','imagenUrl','id_administrador','id_tipoPublicacion') VALUES ('$titulo','$descripcion','$cuerpo','$imagenUrl','$id_administrador','$id_tipoPublicacion')";
          try{
              $comando=$db->prepare($query);
              $comando->execute();
              return $mensaje="publicacion creada con exito";
          }
          catch (PDOException $exception){
              return $mensaje="fallo al crear la publicacion";
          }
      }
      public function ObtenerTodas(){
          $db=DATABASE::getInstance()->getDb();
          $query="select * from pubicaciones";
          try{
             $comando= $db->prepare($query);
              $comando->execute();
          }
          catch (PDOException $exception){

          }
      }
      public function ActualizarPublicacion($id,$titulo,$descripcion,$cuerpo,$imagenUrl,$id_tipoPublicacion){
          $db=DATABASE::getInstance()->getDb();
          $query="update publicaciones set 'titulo'='$titulo',
          'descripcion'='$descripcion',
          'cuerpo'='$cuerpo',
          'imagenUrl'='$imagenUrl',
          'id_tipoPublicacion'='$id_tipoPublicacion'
          where 'idPublicacion'='$id'";
          try{
              $comando=$db->prepare($query);
              $comando->execute();
              return $mensaje="publicacion creada con exito";
          }
          catch (PDOException $exception){
              return $mensaje="fallo al crear la publicacion";
          }
      }
      public function EliminarPublicacion($id){
          $db=DATABASE::getInstance()->getDb();
          $query="delete from publicaciones where idPublicacion = '$id'";
          try{
              $comando=$db->prepare($query);
              $comando->execute();
              return $mensaje="registro eliminado";
          }
          catch (PDOException $exception){
              return $mensaje="no se pude eliminar";
          }
      }
  }