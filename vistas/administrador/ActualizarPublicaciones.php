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
                    require("../../modelos/Publicaciones.php");
                    ?>
                    <?php
                    $obtener=new Publicaciones();
                      if (isset($_GET['editar']))
                      {
                          $id=$_GET['editar'];
                          $datos=$obtener->ObtenerPorID($id);
                      }
                      $combo=$obtener->llenarCombo();
                    ?>

                    <div class="container">
                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="col-md-4">
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
                            </div><div class="form-group">
                                <div class="col-md-4">
                                    <select class="form-control" name="txttipoPublicacion">
                                        <option value="0" selected="selected">seleccione</option>
                                        <?php
                                        foreach ($combo as $item){
                                            echo "<option value='".$item['id_tipoPublicacion']."'>".$item['tipoPublicacion']."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div><div class="form-group">
                                <div class="col-md-4">
                                    <input type="submit" class="btn btn-success" value="actualizar"/>
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
