<?php require("header.php");?>

<?php require ("../config/conexion.php");
include "../../modelos/Alumnos.php";
?>
<div class="container">
    <div class="page-tilte">
        <h1>Perfil</h1>
        <p>actualiza tu perfil</p>
    </div>
    <di class="col-lg-4">
        <?php
         $alumno= new Alumnos();
         $data=$alumno->perfilALummo($_SESSION['id']);
        ?>
        <form action="" name="" enctype="multipart/form-data">
            <div class="form-group">
                <div class="col-md-4">
                    <label>nombre:</label>
                    <input type="text" name="nombre" class="form-control" value="<?php echo $data['nombre']?>" />
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-4">
                    <label>apellido:</label>
                    <input type="text" name="apellido" class="form-control" value="<?php echo $data['apellido']?>" />
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-4">
                    <label>email:</label>
                    <input type="text" name="email" class="form-control" value="<?php echo $data['email']?>" />
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-4">
                    <label>imagen:</label>
                    <img src="<?php echo $data['imagenUrl'];?>" class="img-thumbnail">
                    <input type="hidden" name="imgenAnterior" value="<?php echo $data['imagenUrl'];?>">
                </div>
                <div class="col-md-4">
                    <label>sube tu imagen:</label>
                    <input name="imagen" type="file" />
                </div>
            </div>
            <div class="form-control-">
                <div class="col-md-4-"><label for=""></label>
                    <input type="submit" name="btnActualizar" class="btn btn-success" value="actualizar datos">
                </div>
            </div>
        </form>
        <ol>
        </ol>
    </di>
</div>
<?php require("footer.php"); ?>