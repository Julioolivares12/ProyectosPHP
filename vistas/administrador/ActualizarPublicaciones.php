<?php
/**
 * Created by PhpStorm.
 * User: julio
 * Date: 30/10/2017
 * Time: 20:20
 */
  require("./plantilla/header.php");
?>
<section id="main-content">

    <section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i>Actualizar</h3>
        <div class="row mt">
            <div class="col-lg-12">
                <div class="page-header">
                    <h1>Actualizar</h1>
                    <a href="index.php">salir</a>
                    <?php
                    //require("../../modelos/Publicaciones.php");
                    require ("../../config/conexion.php");
                    ?>
                    <?php
                   // $obtener=new Publicaciones();
                      if (isset($_GET['editar']))
                      {
                          $id=$_GET['editar'];
                          $query="select * from publicaciones inner join tipopublicacion on tipopublicacion.id_tipoPublicacion=publicaciones.id_tipoPublicacion where publicaciones.idPublicacion='$id' ";
                          $resul=mysqli_query($con,$query);
                          $datos=mysqli_fetch_array($resul);
                      }
                      $llenar="select * from tipopublicacion";
                      $resultado=mysqli_query($con,$llenar);

                      //$combo=mysqli_fetch_array($resultado);
                    ?>

                    <div class="container">
                        <form class="form-horizontal" name="actualizar" action="../../controlador/PublicacionesController.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="col-md-4">
                                    <input type="hidden" name="txtid" value="<?php echo $datos['idPublicacion']?>">
                                    <input type="text" name="txttitulo" value="<?php echo $datos['titulo']?>" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <input type="text" name="txtdescripcion" value="<?php echo $datos['descripcion']?>" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <textarea class="form-control" cols="50" rows="10" name="txtcuerpo"><?php echo $datos['cuerpo']?></textarea>
                                </div>
                            </div><div class="form-group">
                                <div class="col-md-4">
                                    <img src="<?php echo $datos['imagenUrl']?>" name="fileImagen" class="img-thumbnail">
                                    <input type="hidden" value="<?php echo $datos['imagenUrl']?>" name="imagenAnterior"/>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <input type="file" id="imagenNueva" class="form-control" name="imagenNueva"/>

                                    </div>
                                    <div class="imagePreview col-md-6">

                                    </div>

                                </div>
                            </div><div class="form-group">
                                <div class="col-md-4">
                                    <select class="form-control" name="txttipoPublicacion">
                                        <option value="0" name="opcion" selected="selected">seleccione</option>
                                        <?php
                                        while ($valores = mysqli_fetch_array($resultado)) {

                                            echo '<option value="'.$valores[id_tipoPublicacion].'">'.$valores['tipoPublicacion'].'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div><div class="form-group">
                                <div class="col-md-4">
                                    <input type="submit" name="actualizar" class="btn btn-success" value="actualizar"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <?php
                                     if(isset($_GET['resultado'])){
                                         echo "<span class='text-danger'>".$_GET['resultado']."</span>";
                                     }
                                    ?>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>


            </div>
        </div>

    </section><!--/wrapper -->
</section>
<script>
$(function () {
    function filePreview(input) {
        if (input.file && input.files[0]){
            var reader = new FileReader();

            reader.onload=function (e) {
                $('.imagePreview').html("<img src='"+e.target.result+" class="img-thumbnail"'>");
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $('#imagenNueva').change(function () {
        filePreview(this);
    })
})();
</script>
<?php
   require ("./plantilla/footer.php");
?>
