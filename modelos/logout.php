<?php
  session_start();

  session_destroy();
header("Location: ../vistas/loginView.php");
?>