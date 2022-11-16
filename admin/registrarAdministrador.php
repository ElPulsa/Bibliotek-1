<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/e5720b39b8.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../JS/scripts.js">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>Bibliotek</title>
</head>
<header> 
    <div class="cabezera">
        <div class="row">
            <div class="logo col-4"><h1>Bibliotek</h1> </div>
            <div class="menu row col-8">
                <div class="col-8"></div>
                <div class="col-1"><a href="#infor_1"><i class="fa fa-home" aria-hidden="true"></i>Home</a> </div>
                <div class="col-1"><a href="listaAdministradores.php"><i class="fa-solid fa-book"></i>Lista admins</a></div>
                <div class="col-1"><a href="listaUsuarios.php"><i class="fa-solid fa-map-location-dot"></i>Lista usuarios</a> </div>
                <div class="col-1"><a href="Libros.php"><i class="fa-solid fa-map-location-dot"></i>Lista libros</a> </div>
                <div class="dropdown-container col-1">
                    <span><i class="fa fa-plus" aria-hidden="true"></i></span>
                    <ul>
                        <li><a href="http://localhost/Bibliotek/login.html">Iniciar sesion</a></li>
                        <li><a href="http://localhost/Bibliotek/registro.php">Crear usuario</a></li>
                        <li>Ayuda</li>
                    </ul>
                </div>
        </div>
    </div>
</header>
<body>


    <div class="container-fluid "> <!-- contenedor de cuerpo de la pagina-->
        <div class="filas row">
            <div class="col-1"></div>
            <div class="formulario col-10"> <!--Incertar contenido aqui-->
                <div class= "registroC">
                    <form  method="post" action="../Procesos/nuevoAdministrador.php">
                        <div class="a1">
                            <H4>Registro de Administrador</H4>
                        </div>
                        <div class="a1">
                            <input type="text" name="Usuario" placeholder="Usuario">
                        </div>
                        <div class="a1">
                            <input type="text" name="Nombre" placeholder="Nombre">
                        </div>
                        <div class="a1">
                            <input type="text" name="Apellido" placeholder="Apellido">   
                        </div>
                        <div class="a1">
                            <input type="password" name="contraseña" placeholder="Contraseña">   
                        </div>
                        <div class="a1">
                            <input type="password" name="contraseña2" placeholder="Contraseña">    
                        </div>
                        <div class="a3">
                        <button type="submit" name="guardar" onclick='return confirmacion()'>Registrar administrador</button>
                        </div>    
                    </form>
                </div>
            </div>
            <div class="col-1"></div>
        </div>
    </div>
</body>
<footer>

</footer>
<script>
 function confirmacion(){
    var respuesta = confirm("¿Desea registrar al administrador?");
    if (respuesta == true) {
      return true;
    }else{
      return false;
    }
}
</script>