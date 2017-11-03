<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <title>Alumnos</title>
</head>
<body>
<nav class="navbar navbar-toggleable-md bg-dark navbar-dark bg-faded">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="./home">Complejo Borja Nathan</a>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">Inicio<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Materias</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">inscribir</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $_SESSION['nombre']; ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Perfil</a>
                    <a class="dropdown-item" href="#">salir</a>

                </div>
            </li>
        </ul>
    </div>
</nav>
<!--<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Brand
    <a class="navbar-brand" href="./home.php">Complejo Borja Nathan</a>

    <!-- Links
    <ul class="navbar-nav my-2">
        <li class="nav-item">
            <a class="nav-link" href="#">Link 1</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Link 2</a>
        </li>

        <!-- Dropdown
        <li class="nav-item dropdown dropdown-menu-left">
            <a class="nav-link dropdown-toggle pull-rigth" href="#" id="navbardrop" data-toggle="dropdown">
                <?php //echo $_SESSION['nombre']; ?>
            </a>
            <div class="dropdown-menu ml-autoS">
                <a class="dropdown-item" href="#">Perfil</a>
                <a class="dropdown-item" href="../../modelos/logout.php">salir</a>

            </div>
        </li>
    </ul>
</nav>-->
