<?php
/**
 * Created by PhpStorm.
 * User: julio
 * Date: 31/10/2017
 * Time: 21:06
 */

 require ("./plantilla/header.php");
 require ("../../config/conexion.php");

?>

<section id="main-content">

    <section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i>Crear</h3>
        <div class="row mt">
            <div class="col-lg-12">
                <div class="page-header">
                    <h1>Crear</h1>
                    <a href="index.php">salir</a>


                    <div class="container">
                        <form class="form-horizontal" name="crear" action="../../controlador/crearPublicacion.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="col-md-4">

                                    <input type="text" name="txttitulo" placeholder="titulo" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <input type="text" name="txtdescripcion" placeholder="descripcion" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <textarea class="form-control" cols="50" rows="10" placeholder="cuerpo de la publicacion" name="txtcuerpo"></textarea>
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label class="label-primary">sube una imagen</label>
                                        <input type="file" id="imagenNueva" class="form-control" name="imagenNueva"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <select class="form-control" name="txttipoPublicacion">
                                        <option value="0" name="opcion" selected="selected">seleccione</option>
                                        <?php
                                        $llenar="select * from tipopublicacion";
                                        $resultado=mysqli_query($con,$llenar);

                                        foreach ($resultado as $datum)
                                            echo '<option value="'.$datum[id_tipoPublicacion].'">'.$datum['tipoPublicacion'].'</option>';

                                        ?>
                                    </select>
                                </div>
                            </div><div class="form-group">
                                <div class="col-md-4">
                                    <input type="submit" name="crear" class="btn btn-success" value="crear"/>
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

<?php
    require ("./plantilla/footer.php");
?>
