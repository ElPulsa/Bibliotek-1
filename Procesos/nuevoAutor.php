
<?php
    
    include 'configServer.php';
    include 'consulSQL.php';

   
    $nombre=consultasSQL::clean_string($_POST['Nombre']);
    $apellido=consultasSQL::clean_string($_POST['apellido']);
    $genero=consultasSQL::clean_string($_POST['genero']);
    
    
    if($nombre!="" && $apellido!="" && $genero!=""){
        $verificar=  ejecutarSQL::consultar("SELECT NombreA FROM administrdores WHERE NombreA ='".$nombre."'");
        $verificaltotal = mysqli_num_rows($verificar);
        
        if($verificaltotal<=0){
            
                        if(consultasSQL::InsertSQL("autores", "NombreA, aApellido, genero",
                         "'$nombre','$apellido', '$genero'")){
                            
                            header('Location: ../admin/Libros.php');

                            }else{
                                echo '<script>swal("ERROR", "No se puedo registrar al usuario en el sistema", "error");</script>';
                            }
        }else{
            echo '<script>swal("ERROR", "El Nuemero de placas que acaba de ingresar ya está registrado en el sistema, por favor ingrese Numero de placas distinto", "error");</script>';
        }
    }else {
        echo '<script>swal("ERROR", "Los campos no deben de estar vacíos, por favor verifique e intente nuevamente", "error");</script>';
    }

