
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
    $usuario=$_POST['idAdministrador'];
    
    $sql = "DELETE FROM administradores WHERE N_Admin = $usuario";
    $result = mysqli_query($conn, $sql);

    if($result){
      header("Location: ../admin/listaAdministradores.php");
    }

?>
