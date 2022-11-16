<?php
    
    include 'configServer.php';
    include 'consulSQL.php';

    $nombre=consultasSQL::clean_string($_POST['name']);
    $genero=consultasSQL::clean_string($_POST['genero']);
    $editorial=consultasSQL::clean_string($_POST['editorial']);
    $edicion=consultasSQL::clean_string($_POST['edicion']);
    $autor=consultasSQL::clean_string($_POST['autor']);
    $copias=consultasSQL::clean_string($_POST['copias']);
    $imgName=$_FILES['img']['name'];
    $imgType=$_FILES['img']['type'];
    $imgSize=$_FILES['img']['size'];
    $imgMaxSize=5120;
    
    if($nombre!="" && $genero!="" && $editorial!="" && $edicion!="" && $autor!="" ){
        $verificar=  ejecutarSQL::consultar("SELECT NombreL, Edicion FROM libros WHERE 
        NombreL='".$nombre."' and Edicion='".$nombre."'");
        $verificaltotal = mysqli_num_rows($verificar);
        
        if($verificaltotal<=0){
            
            if($imgType=="image/jpeg" || $imgType=="image/png"){
                
                if(($imgSize/1024)<=$imgMaxSize){
                    switch ($imgType) {
                      case 'image/jpeg':
                        $imgEx=".jpg";
                      break;
                      case 'image/png':
                        $imgEx=".png";
                      break;
                    }
                    $imgFinalName=$nombre.$imgEx;
                    $url = 'img/'.$imgFinalName;
                    
                    if(move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$imgFinalName)){
                        for($i=$copias; $i>0; $i--){
                            if(consultasSQL::InsertSQL("libros", "NombreL, Genero, Editorial, Edicion,
                         Autores_N_autor, Img", 
                         "'$nombre','$genero','$editorial', '$edicion', '$autor','$url'")){
                            echo '<script>
                                swal({
                                  title: "Nuevo registro",
                                  text: "El auto se añadió a la tienda con éxito",
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
                            echo '<script>swal("ERROR", "Ocurrió un error inesperado, por favor intente nuevamente", "error");</script>';
                        }   
                    }}else{
                        echo '<script>swal("ERROR", "Ha ocurrido un error al cargar la imagen", "error");</script>';
                    }  
                }else{
                    echo '<script>swal("ERROR", "Ha excedido el tamaño máximo de la imagen, tamaño máximo es de 5MB", "error");</script>';
                }
            }else{
                echo '<script>swal("ERROR", "El formato de la imagen del producto es invalido, solo se admiten archivos con la extensión .jpg y .png ", "error");</script>';
            }
        }else{
            echo '<script>swal("ERROR", "El Nuemero de placas que acaba de ingresar ya está registrado en el sistema, por favor ingrese Numero de placas distinto", "error");</script>';
        }
    }else {
        echo '<script>swal("ERROR", "Los campos no deben de estar vacíos, por favor verifique e intente nuevamente", "error");</script>';
    }

