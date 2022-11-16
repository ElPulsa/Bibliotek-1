<?php
error_reporting(0);
?>
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
    <div class="invetario">
        <h2>Lista de Clientes</h2>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Dirreccion</th>
                    <th>Fecha de nacimiento</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                  include '../Procesos/configServer.php';
                  include '../Procesos/consulSQL.php';
                  $consulta= ejecutarSQL::consultar("SELECT N_Usuario, NombreU, Apellido, Direccion, FNacimiento FROM usuario ORDER BY N_Usuario DESC");
                  $ListaUsuarios = mysqli_num_rows($consulta);
                  if($ListaUsuarios>0){
                      while($fila=mysqli_fetch_array($consulta, MYSQLI_ASSOC)){
                        $nombreU = $fila[NombreU];
                        $apellido = $fila[Apellido];
                        $dir = $fila[Direccion];
                        $fecha = $fila[FNacimiento];
                        

                ?>
                <tr>
                    <td><?php echo $nombreU;?></td>
                    <td><?php echo $apellido;?></td>
                    <td><?php echo $dir;?></td>
                    <td><?php echo $fecha;?></td>
                    <td>
                        <form action="Editar.php" method="post">
                            <input type="hidden" name="idUsuario" value="<?=$fila['N_Usuario'];?>">
                            <input type="submit" class="btn btn-custom" value="Editar">
                        </form>
                    </td>
                    <td>
                        <form action="Eliminar.php" method="post">
                            <input type="hidden" name="usuario" value="<?=$fila['N_Usuario'];?>">
                            <input type="submit" class="btn btn-custom" value="Eliminar" onclick='return confirmacion()'>
                        </form>
                    </td>

                </tr>
                <?php
                      }
                      }
                ?>             

            </tbody>
        </table>

    </div>
    
</body>
<footer>

</footer>
<script>
 function confirmacion(){
    var respuesta = confirm("¿Desea eliminar el registro?");
    if (respuesta == true) {
      return true;
    }else{
      return false;
    }
}
</script>