<?php
/**
 * Created by PhpStorm.
 * User: julio
 * Date: 30/10/2017
 * Time: 16:25
 */
require ("mysql_login.php");
  $con= mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DATABASE);
  if (mysqli_connect_errno()){
      echo 'error en la conexion....'.mysqli_connect_error();
  }