<?php
require ("../config/database.php");
  class Publicaciones{

      public function __construct()
      {

      }
      public function crearPublicacion($titulo,$descripcion,$cuerpo,$imagenUrl,$id_administrador,$id_tipoPublicacion){

          $query="INSERT INTO publicaciones ('titulo','descripcion','cuerpo','imagenUrl','id_administrador','id_tipoPublicacion') VALUES ('$titulo','$descripcion','$cuerpo','$imagenUrl','$id_administrador','$id_tipoPublicacion')";
          try{
              $comando=DATABASE::getInstance()->getDb()->prepare($query);
              $comando->execute();
              return $mensaje="publicacion creada con exito";
          }
          catch (PDOException $exception){
              return $mensaje="fallo al crear la publicacion".$exception->getMessage().$exception->errorInfo;
          }
      }
      public function ObtenerTodas(){
          $db=DATABASE::getInstance()->getDb();
          $query="select publicaciones.idPublicacion, publicaciones.titulo,publicaciones.descripcion,publicaciones.cuerpo,tipopublicacion.tipopublicacion from publicaciones inner join tipopublicacion on tipopublicacion.id_tipoPublicacion=publicaciones.id_tipoPublicacion ";
          try{
             $comando= $db->prepare($query);
              $comando->execute();
              return $comando->fetchAll(PDO::FETCH_ASSOC);
          }
          catch (PDOException $exception){

          }
      }
      public function ObtenerPorID($id){
          $db=DATABASE::getInstance()->getDb();
          $query="select * from publicaciones inner join tipopublicacion on tipopublicacion.id_tipoPublicacion=publicaciones.id_tipoPublicacion where publicaciones.idPublicacion='$id' ";
          try{
             $cmd=$db->prepare($query);
             $cmd->execute();
             return $cmd->fetchAll(PDO::FETCH_ASSOC);
          }catch (PDOException $exception){
              return $cmd->errorCode();
          }
      }
      public function llenarCombo(){
          $db = DATABASE::getInstance()->getDb();
          $query="select * from tipopublicacion";
          try{
              $comando=$db->prepare($query);
              $comando->execute();
              return $comando->fetchAll(PDO::FETCH_ASSOC);
          }catch (PDOException $exception){

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
              $mensaje="publicacion creada con exito";
              return $mensaje;
          }
          catch (PDOException $exception){
              $mensaje="fallo al actualizar la publicacion".$comando->errorInfo();
              return $mensaje;
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