<?php include('plantilla/header.php')?>
<section id="main-content">

    <section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i> Inicio</h3>
        <div class="row mt">
            <div class="col-lg-12">
                <nav class="breadcrumb">
                    <a class="breadcrumb-item" href="#">Home</a>
                    <a class="breadcrumb-item" href="#">Library</a>
                    <a class="breadcrumb-item" href="#">Data</a>
                    <span class="breadcrumb-item active">Bootstrap</span>
                </nav>
                <div class="page-header">
                    <h1>Inicio</h1>
                    <a href="#">crear</a>
                    <table class="table table-responsive">
                        <thead>
                        <tr>
                            <td>titulo</td>
                            <td>descripcion</td>
                            <td>cuerpo</td>
                            <td>tipo de publicacion</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        include "../../modelos/Publicaciones.php";
                        //equire("../../config/conexion.php");
                        ?>
                        <?php
                        $publicaciones= new Publicaciones();
                        $data = $publicaciones->ObtenerTodas();
                        //$query="select publicaciones.titulo,publicaciones.descripcion,publicaciones.cuerpo,tipopublicacion.tipopublicacion from publicaciones inner join tipopublicacion on tipopublicacion.id_tipoPublicacion=publicaciones.id_tipoPublicacion ";
                        //$resultado=mysqli_query($con,$query);
                        //$datos=mysqli_fetch_array($resultado);
                        echo "<form action='../../PublicacionesControlller.php'>";
                        foreach ($data as $datos){
                            echo " <tr>";
                            echo "<td><input class='form-control' type='text' value='".$datos["titulo"]."'/></td>";
                            echo "<td><input class='form-control' type='text' value='".$datos["descripcion"]."'/></td>";
                           // echo "<td><input class='form-control' type='text' value='".$datos["cuerpo"]."'/></td>";
                            echo "<td><input class='form-control' type='text' value='".$datos["tipopublicacion"]."'/></td>";

                            echo "<td>"."<a href='./ActualizarPublicaciones.php?editar=".$datos['idPublicacion']."'>Editar</a>";
                            echo "<td>"."<a href='../../controlador/PublicacionesController.php?eliminar=".$datos['idPublicacion']."'>Eliminar</a>";
                            echo "</tr>";
                        }
                        echo "</form>";
                        ?>


                        </tbody>
                        <tfoot>
                        <tr><td>crud para publicaciones</td></tr>
                        </tfoot>
                    </table>
                </div>


            </div>
        </div>

    </section><!--/wrapper -->
</section>
<?php include('plantilla/footer.php')?>