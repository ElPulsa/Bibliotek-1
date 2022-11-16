<?php
    
    include 'configServer.php';
    include 'consulSQL.php';

    $nombre = filter_input(INPUT_POST, 'name');
    $apellido=filter_input(INPUT_POST, 'lastname');
    $direccion=filter_input(INPUT_POST, 'andress');
    $fecha = filter_input(INPUT_POST, 'date');
    $pass = filter_input(INPUT_POST, 'pass1');
    $pass2 = filter_input(INPUT_POST, 'pass2');
    
    

    if($pass !== $pass2){
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

    $Contraseña = $pass;
    



    if($nombre!="" && $apellido!="" && $direccion!="" && $fecha!="" && $pass!="" && $pass2!="" ){
        $verificar=  ejecutarSQL::consultar("SELECT NombreU FROM usuario WHERE NombreU='".$nombre."' and Apellido ='".$nombre."' ");
        $verificaltotal = mysqli_num_rows($verificar);
        
        if($verificaltotal<=0){
            
                        if(consultasSQL::InsertSQL("usuario", "NombreU, Apellido, Direccion, FNacimiento, ContraU", 
                         "'$nombre','$apellido','$direccion','$fecha', '$Contraseña'")){
                            echo '<script>
                                swal({
                                  title: "Nuevo registro",
                                  text: "El usuario se registro con exito",
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
                            </script>';
                              
                            }else{
                                echo '<script>swal("ERROR", "No se puedo registrar al usuario en el sistema", "error");</script>';
                            }
        }else{
            echo '<script>swal("ERROR", "El Nuemero de placas que acaba de ingresar ya está registrado en el sistema, por favor ingrese Numero de placas distinto", "error");</script>';
        }
    }else {
        echo '<script>swal("ERROR", "Los campos no deben de estar vacíos, por favor verifique e intente nuevamente", "error");</script>';
    }

