<?php

include_once 'Procesos/user_index.php';
include_once 'Procesos/index_session.php';


$userSession = new UserSession();
$user = new User();

if(isset($_SESSION['user'])){
    echo "Hay sesión";
    $user->setUser($userSession->getCurrentUser());
    header('Location: Usuario/home.php');
}else if(isset($_POST['user']) && isset($_POST['pass'])){
    echo "Validación de login";

    $userForm = $_POST['user'];
    $passForm = $_POST['pass'];
    

    if($user->userExists($userForm, $passForm)){
        echo "usuario validado";
        $userSession->setCurrentUser($userForm);
        $user->setUser($userForm);

        header('Location:  Usuario/home.php');
    }else{
        echo "nombre de usuario y/o password incorrecto";
        $errorLogin = "Nombre de usuario y/o password es incorrecto";
        //header('Location: login.php');
    }

}else{
    header('Location: login.html');
    //include_once 'vistas/login.php';
}


?>