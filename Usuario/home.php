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
    <?php
    include_once '../Procesos/user.php';
    include_once '../Procesos/user_session.php'; 
    header('Content-Type: text/html; charset=UTF-8');
    session_start();
    if (isset($_SESSION['user'])){
        $cliente = $_SESSION['user'];
    }else{
  header('Location: login.php');
     die() ;
    }
  ?>
    <title>Bibliotek</title>
</head>
<header> 
    <div class="cabezera">
        <div class="row">
            <div class="logo col-4"><h1>Bibliotek</h1></div>
            <div class="menu row col-8">
                <div class="col-8"></div>
                <div class="col-1"><a href="#infor_1"><i class="fa fa-home" aria-hidden="true"></i>Home</a> </div>
                <div class="col-1"><a href="#lista_libros_1"><i class="fa-solid fa-book"></i>Libros</a></div>
                <div class="col-1"><a href="#nosotros"><i class="fa-solid fa-map-location-dot"></i>Nosotros</a> </div>
                <div class="dropdown-container col-1">
                    <span> <?php echo  $cliente  ;  ?><i class="fa fa-plus" aria-hidden="true"></i></span>
                    <ul>
                        <li><a href="">Iniciar sesion</a></li>
                        <li><a href="http://localhost/Bibliotek/registro.php">Crear usuario</a></li>
                        <li>Ayuda</li>
                    </ul>
                </div>
        </div>
    </div>
</header>
<body>
    <div class="infor_1">
        <Div class="titulo">
            <h2>Usuario</h2>
        </Div>
        <div>
            <p>nostos somos una nuevo tipo de libreria, que te permitira hacercarte a los libros.</p>
        </div>

    </div>
    <div class="lista_libros_1"> 
            <h2>ultimos libros agregados</h2>
            <div class="tarjetero">
                <?php
                    include '../Procesos/configServer.php';
                    include '../Procesos/consulSQL.php';
                    $consulta= ejecutarSQL::consultar("SELECT  DISTINCT NombreL, Img, Genero, Edicion, NombreA 
                    FROM libros, autores where N_autor = Autores_N_autor ORDER BY N_Libro DESC limit 5");
                    $ListaCosches = mysqli_num_rows($consulta);
                    if($ListaCosches>0){
                        while($fila=mysqli_fetch_array($consulta, MYSQLI_ASSOC)){
                    ?>
                <div class="tarjeta">
                    <div class="img"><?php echo "<img src='../".$fila['Img']."'>";?></div>
                    <div><h5><?php echo $fila['NombreL'];?></h5></div>
                    <div><p><?php echo $fila['NombreA'];?></p></div>
                    <div><p><?php echo $fila['Genero'];?></p></div>
                    <div><?php echo $fila['Edicion'];?></div>
                </div>
                <?php
                      }
                      }
                ?>

                <div>
                    
                </div>
                
                
            </div>
<a href="http://localhost/Bibliotek/biblioteca.php">Conose todos nuestros libros</a>
    </div>

    <div class="nosotros">
        <div class="titulo"><h2>Sobre nosotros</h2></div>
        <p>Somos una empresa que ama los libros y queremos que todos tengan la oportunidad de leer su libro faborito cuando quieran de la manera mas censilla posible, por lo que buscamos reinventar la forma en que todos 
            leen, haciendo uso de erramientas modernas para que siempre sepas si el libro que buscas esta disponible o incluso mejor que nisiquiera salgas de casa para leer.
        </p>
        <div class="titulo"><h2>Horario</h2></div>
        <div>
            <div><h4>Lunes-Sabado</h4></div>
            <div><h6>8:00-20:00</h6></div>
        </div>

        <div class="titulo"><h2>Ubicanos en </h2></div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d2015.742450871096!2d-116.59629900826603!3d31.823326288593556!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2smx!4v1667187789522!5m2!1ses!2smx"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

    </div>
</body>
<footer class="pie_pagina container">
    <div class="row">
        <div class="pie col-4">
            <div><h4>Contacto</h4></div>
            <div><p>Correo: ayuda@bibliotek.com</p></div>
            <div><p>Telefono: 6462103025</p></div>
        </div>
        <div class="pie col-4">
            <div><h4>Dirreccion</h4></div>
            <div><p>Universidad Autónoma de Baja California - UABC Campus Valle Dorado</p></div>
        </div>
        <div class="pie col-4">
            <div><h4>©</h4></div>
            <div><p>Copyright &copy; Bibliotek FH 2022</p></div>
        </div>
        </div>
</footer>
</html>