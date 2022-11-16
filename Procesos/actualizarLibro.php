
  <?php
    header('Content-Type: text/html; charset=UTF-8');
    //Iniciar una nueva sesión o reanudar la existente.
    session_start();
    //Si existe la sesión "cliente"..., la guardamos en una variable.
    if (isset($_SESSION['user'])){
        $cliente = $_SESSION['user'];
    }else{
  header('Location: login.php');//Aqui lo redireccionas al lugar que quieras.
     die() ;

    }
    ?>

  <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "biblitek";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    $libro=$_POST['libro'];
    $nombre = $_POST['nombre'];
    $autor = $_POST['autor'];
    $editorial = $_POST['editorial'];
    $edicion = $_POST['edicion'];
    $genero = $_POST['genero'];
    $cuantos = $_POST['cuantos'];
    
   
       $sql = "UPDATE libros SET NombreL='$nombre', Genero='$genero', Editorial='$editorial', Edicion='$edicion'
    , Autores_N_autor='$autor' WHERE N_libro = '$libro'";
    $result = mysqli_query($conn, $sql);

    if($result){
      header("Location: ../admin/libros.php");
    }else{
      echo "Error1";
    }
    

   


?>


