
  <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "biblitek";

    $libro=$_POST['libro'];

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    
    $sql = "SELECT N_Libro, Img, NombreL, Genero, Editorial, Edicion, 
    Autores_N_autor, NombreA FROM libros, autores WHERE N_Libro = '$libro'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
        $idLibro = $row['N_Libro'];
        $img = $row['Img'];
        $nombre = $row['NombreL'];
        $nombre2 = $row['NombreL'];
        $genero = $row['Genero'];
        $editorial = $row['Editorial'];
        $edicion = $row['Edicion'];
        $autor = $row['NombreA'];
        $nAutor = $row['Autores_N_autor'];

      }
    } else {
      echo $usuario ;
      echo '<br>';
      echo "0 results";
    }
    ?>
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
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
<div class="container">
        <div class="row">
            <div class="col-1 "></div>
            <div class="formulario col-10">
               <div class="registroU">
                    <form action="../Procesos/actualizarLibro.php" method="post">
                      <table> 
                        <thead >
                          <tr class="Heading">
                            <th></th>
                          <th class="Cell">Informacion anterior</th>
                          <th class="Cell">Nueva informacion</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><h6>Nombre libro:</h6></td>
                            <td> <?php echo $nombre;?></td>
                            <td><input type="text" name="nombre"></td>
                          </tr>
                          <tr>
                            <td><h6>Autor:</h6></td>
                            <td> <?php echo $autor;?></td>
                            <input type="hidden" name="nAutor" valuel="<?=$nAutor?>">
                            <td><input type="text" name="autor"></td>
                          </tr>
                          <tr>
                            <td><h6>Editorial: </h6></td>
                            <td><?php echo $editorial;?></td>
                            <td><input type="text" name="editorial"></td>
                          </tr>  
                          <tr>
                            <td><h6>Edicion:</h6></td>
                            <td> <?php echo $edicion;?></td>
                            <td><input type="text" name="edicion"></td>
                          </tr>
                          <tr>
                            <td><h6>Genero:</h6></td>
                            <td> <?php echo $genero;?></td>
                            <td><input type="text" name="genero"></td>
                          </tr>
                          <tr>
                            <td></td>
                            <td>
                              <input type="radio" name="cuantos" value="1" >
                              <label for="cuantos" class="">Editar solo una copia</label>
                            <td>
                              <input type="radio" name="cuantos" value="2" >
                              <label for="cuantos" class="">Editar todos los libros iguales</label>
                            </td>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                            <input type="hidden" name="nLibro" id="nLibro" valuel="<?=$nombre2?>">
                            <input type="hidden" name="libro" id="id" value="<?=$idLibro?>">
                            <input type="submit" class="btn btn-custom" value="Actualizar">
                            <button onclick="ListaCarros.php" class="btn btn-custom">Regresar</button>
                        
                    </form>
               </div>
            </div>
            
        </div>
    </div>

    <tbody>
      
    </tbody>

</div>



<!-- Footer -->
<footer class="text-center">
  <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a><br><br>
   
</footer>

<script>
$(document).ready(function(){
  // Initialize Tooltip
  $('[data-toggle="tooltip"]').tooltip(); 
  
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {

      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
})

</script>

</body>
</html>