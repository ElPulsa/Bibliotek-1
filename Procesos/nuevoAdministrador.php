
<?php
    
    include 'configServer.php';
    include 'consulSQL.php';

    $usuario=consultasSQL::clean_string($_POST['Usuario']);
    $nombre=consultasSQL::clean_string($_POST['Nombre']);
    $apellido=consultasSQL::clean_string($_POST['Apellido']);
    $contraseña=consultasSQL::clean_string($_POST['contraseña']);
    $contraseña2=consultasSQL::clean_string($_POST['contraseña2']);
    
    

    if($contraseña !== $contraseña2){
        ?><script>
                                swal({
                                  title: "Error en las contrase;as",
                                  text: "Las contrase;as no coinsiden",
                                  type: "success",
                                  showCancelButton: true,
                                  confirmButtonClass: "btn-danger",
                                  confirmButtonText: "Aceptar",
                                  cancelButtonText: "Cancelar",
                                  closeOnConfirm: false,
                                  closeOnCancel: false
                                  },
                                  function(isConfirm) {
                                  if (isConfirm) {
                                    location.reload();
                                  } else {
                                    location.reload();
                                  }
                                });
                            </script> <?php
    }

    



    if($usuario!="" && $nombre!="" && $apellido!="" && $contraseña!="" && $contraseña2!="" ){
        $verificar=  ejecutarSQL::consultar("SELECT A_Usuario FROM administrdores WHERE A_Usuario='".$usuario."'");
        $verificaltotal = mysqli_num_rows($verificar);
        
        if($verificaltotal<=0){
            
                        if(consultasSQL::InsertSQL("administradores", "A_Usuario, Nombre, Apellido, Passaword",
                         "'$usuario','$nombre','$apellido', '$contraseña'")){
                            
                            header('Location: ../admin/listaAdministradores.php');

                            }else{
                                echo '<script>swal("ERROR", "No se puedo registrar al usuario en el sistema", "error");</script>';
                            }
        }else{
            echo '<script>swal("ERROR", "El Nuemero de placas que acaba de ingresar ya está registrado en el sistema, por favor ingrese Numero de placas distinto", "error");</script>';
        }
    }else {
        echo '<script>swal("ERROR", "Los campos no deben de estar vacíos, por favor verifique e intente nuevamente", "error");</script>';
    }

