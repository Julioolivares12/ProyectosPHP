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

                            <td>tipo de publicacion</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                       // include "../../modelos/Publicaciones.php";
                        require("../../config/conexion.php");
                        ?>
                        <?php
                       // $publicaciones= new Publicaciones();
                       // $data = $publicaciones->ObtenerTodas();
                        $query="select publicaciones.idPublicacion, publicaciones.titulo,publicaciones.descripcion,publicaciones.cuerpo,tipopublicacion.tipopublicacion from publicaciones inner join tipopublicacion on tipopublicacion.id_tipoPublicacion=publicaciones.id_tipoPublicacion ";                        $resultado=mysqli_query($con,$query);

                        echo "<form action='../../PublicacionesControlller.php'>";
                        while($data=mysqli_fetch_array($resultado)){
                            echo " <tr>";
                            echo "<td><input class='form-control' type='text' value='".$data["titulo"]."'/></td>";
                            echo "<td><input class='form-control' type='text' value='".$data["descripcion"]."'/></td>";
                            // echo "<td><input class='form-control' type='text' value='".$datos["cuerpo"]."'/></td>";
                            echo "<td><input class='form-control' type='text' value='".$data["tipopublicacion"]."'/></td>";

                            echo "<td>"."<a href='./ActualizarPublicaciones.php?editar=".$data['idPublicacion']."'>Editar</a>";
                            echo "<td>"."<a href='../../controlador/PublicacionesController.php?eliminar=".$data['idPublicacion']."'>Eliminar</a>";
                            echo "</tr>";
                        }
                        echo "</form>";
                        ?>


                        </tbody>
                        <tfoot>
                        <tr><td><?php
                                    if(isset($_GET['resultado'])){
                                        echo "<span class='text-danger'>".$_GET['resultado']."</span>";
                                    }
                                    ?>
                                </td></tr>
                        </tfoot>
                    </table>
                </div>


            </div>
        </div>

    </section><!--/wrapper -->
</section>
<?php include('plantilla/footer.php')?>