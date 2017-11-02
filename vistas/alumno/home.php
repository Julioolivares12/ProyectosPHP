<?php
session_start();
if($_SESSION['tipo']==1)
{
    session_destroy();
    header("Location: ../administrador/index.php");
}
else if ($_SESSION['tipo']==2){
    session_destroy();
    header("Location: ../profesor/index.php");
}
   include 'plantilla/header.php';
?>
<div class="container">
    <div class="page-tilte">
        <h1>Bienvenido Alumno:<?php echo $_SESSION['nombre']?></h1>
        <p>sitio en contruccion</p>
    </div>
    <di class="col-lg-4">
        <ol>
            aqui van las materias de los alumnos
        </ol>
    </di>
</div>

<?php include 'plantilla/footer.php';?>
