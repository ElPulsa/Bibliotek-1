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
            <div class="logo col-4"><h1>Bibliotek</h1></div>
            <div class="menu row col-8">
                <div class="col-7"></div>
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
<div class="formulrio1">
<br>
    <div class="registro">
        <h2>Nuevo registro de autor</h2>
        <form action="../Procesos/nuevoAutor.php" method="post">
            <label for="">Nombre</label>
            <input type="text" name="Nombre"><br>
            <label for="">Apellido</label>
            <input type="text" name="apellido"><br>
            <label for="">Genero literario</label>
            <input type="text" name="genero"><br>
            <input type="submit" value="Registar">
        </form><br>
    </div>

</div>
</body>
<footer class="pie_pagina">
    <div class="pie">
        <div><h4>Contacto</h4></div>
        <div><p>Correo: ayuda@bibliotek.com</p></div>
        <div><p>Telefono: 6462103025</p></div>
    </div>
    <div class="pie">
        <div><h4>Dirreccion</h4></div>
        <div><p>Universidad Autónoma de Baja California - UABC Campus Valle Dorado</p></div>
    </div>
    <div class="pie">
        <div><h4>©</h4></div>
        <div><p>Copyright &copy; Bibliotek FH 2022</p></div>
    </div>
</footer>
</html>