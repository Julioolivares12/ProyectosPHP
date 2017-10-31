<?php
/**
 * Created by PhpStorm.
 * User: julio
 * Date: 30/10/2017
 * Time: 14:51
 */

include "../modelos/Publicaciones.php";

 class PublicacionesController{
     public function __construct()
     {
         $this->Editar();
     }
     public function Editar($id){
         echo "hola";
         //return "Hola";
     }
 }