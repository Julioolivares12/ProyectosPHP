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
                    <a href="#">salir</a>
                    <?php
                    require("../../modelos/Publicaciones.php");
                    ?>
                    <?php
                    $obtener=new Publicaciones();
                      if (isset($_GET['editar'])){
                          $datos=$obtener->ObtenerPorID($_GET['editar']);
                      }
                      $combo=$obtener->llenarCombo();
                    ?>

                    <div class="container">
                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                            <input type="text" name="txttitulo" value="<?php echo $datos['titulo']?>" class="form-control"/>
                            <input type="text" name="txtdescripcion" value="<?php echo $datos['descripcion']?>" class="form-control"/>
                            <textarea class="form-control" cols="50" rows="5" name="txtcuerpo"><?php echo $datos['cuerpo']?></textarea>
                            <img src="<?php echo $datos['imagenUrl']?>" name="fileImagen" class="img-thumbnail">
                            <input type="hidden" value="<?php echo $datos['imagenUrl']?>" name="imagenAnterior"/>
                            <select class="form-control" name="txttipoPublicacion">
                                <option value="0" selected="selected">seleccione</option>
                                <?php
                                foreach ($combo as $item){
                                    echo "<option value='".$item['id_tipoPublicacion']."'>".$item['tipoPublicacion']."</option>";
                                }
                                ?>
                            </select>
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
