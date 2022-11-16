<?php 
  
  include_once '../Procesos/admin.php';
  include_once '../Procesos/admin_session.php';
  include '../Procesos/configServer.php';
  include '../Procesos/consulSQL.php';


  ?>
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
    $id=$_POST['N_Admin'];
    $usuario = $_POST['usuario'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['Apellido'];

    
    
    $sql = "UPDATE administradores SET N_Admin='$id', A_Usuario='$usuario', Nombre='$nombre', Apellido='$apellido' WHERE N_Admin = '$id'";
    $result = mysqli_query($conn, $sql);

    if($result){
      header("Location: ../admin/listaAdministradores.php");
    }


?>
?>

