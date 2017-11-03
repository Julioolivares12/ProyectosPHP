<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <title>crear Cuenta</title>
    <style type="text/css" href="../css/login.css"/>
    <style>
        * {
            box-sizing: border-box;
        }

        *:focus {
            outline: none;
        }
        body {
            font-family: Arial;
            background-color: #3498DB;
            padding: 50px;
        }
        .login {
            margin: 20px auto;
            width: 300px;
        }
        .login-screen {
            background-color: #FFF;
            padding: 20px;
            border-radius: 5px
        }

        .app-title {
            text-align: center;
            color: #777;
        }

        .login-form {
            text-align: center;
        }
        .control-group {
            margin-bottom: 10px;
        }

        input {
            text-align: center;
            background-color: #ECF0F1;
            border: 2px solid transparent;
            border-radius: 3px;
            font-size: 16px;
            font-weight: 200;
            padding: 10px 0;
            width: 250px;
            transition: border .5s;
        }

        input:focus {
            border: 2px solid #3498DB;
            box-shadow: none;
        }

        .btn {
            border: 2px solid transparent;
            background: #3498DB;
            color: #ffffff;
            font-size: 16px;
            line-height: 25px;
            padding: 10px 0;
            text-decoration: none;
            text-shadow: none;
            border-radius: 3px;
            box-shadow: none;
            transition: 0.25s;
            display: block;
            width: 250px;
            margin: 0 auto;
        }

        .btn:hover {
            background-color: #2980B9;
        }

        .login-link {
            font-size: 12px;
            color: #444;
            display: block;
            margin-top: 12px;
        }
    </style>
</head>
<body>

<div class="login">
    <div class="login-screen">
        <div class="app-title">
            <h1>Login</h1>
        </div>

        <div class="login-form">
            <form action="../controlador/crearCuentaAlumno.php" method="post" enctype="multipart/form-data" name="loginform">
                <div class="control-group">
                    <input type="text" class="login-field" name="nombre" placeholder="nombre" id="login-name">
                    <label class="login-field-icon fui-user" for="login-name"></label>
                </div>
                <div class="control-group">
                    <input type="text" class="login-field" name="apellido" placeholder="apellido" id="login-name">
                    <label class="login-field-icon fui-user" for="login-name"></label>
                </div>
                <div class="control-group">
                    <input type="email" class="login-field" name="email" placeholder="email" id="login-name">
                    <label class="login-field-icon fui-user" for="login-name"></label>
                </div>
                <div class="control-group">
                    <input type="password" class="login-field" name="password" placeholder="password" id="login-name">
                    <label class="login-field-icon fui-user" for="login-name"></label>
                </div>
                <div class="control-group">
                    <label for="imagenUsu" class="login-form">sube tu foto</label>
                    <input type="file" class="" name="imagenUsu"  id="login-name">
                    <label class="login-field-icon fui-user" for="login-name"></label>
                </div>


                <input type="submit" class="btn btn-primary btn-large btn-clock" value="login"/>
                <?php
                if (isset($_GET['$errorMensaje']))
                {
                    echo "<div class='text-danger'>";
                    echo $_GET['$errorMensaje'];
                    echo "</div>";
                }
                ?>
            </form>
            <a class="login-link" href="./loginView.php">salir</a>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
</body>
</html>