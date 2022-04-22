<?php

include __DIR__.'/vendor/autoload.php';

use \App\Session\Login;
use \App\Entity\Usuario;

// Requisita o usuário a não estar logado para poder acessar
Login::requireLogout();

$alertLog = '';
$alertRegister = '';

// Validação 
if(isset($_POST['action'])) {


    switch($_POST['action']) {
        case 'log';
            
        $obUsuario = Usuario::getUserByEmail($_POST['email']);

        if(!$obUsuario instanceof Usuario) {
            $alertLog = 'E-mail ou senha invalidos';
        }
        // echo "<pre>";
        // print_r($obUsuario);
        // echo "</pre>";exit;
        
        // Loga usuário
        Login::login($obUsuario);

        break;

        case 'register';

        if(isset($_POST['nome'],$_POST['email'],$_POST['senha'])) {

            $obUsuario = Usuario::getUserByEmail($_POST['email']);

            if($obUsuario instanceof Usuario) {
                $alertRegister = 'O E-mail ja está em uso';
                break;
            }
            
            $obUsuario = new Usuario;
            $obUsuario->nome = $_POST['nome'];
            $obUsuario->email = $_POST['email'];
            $obUsuario->senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
            $obUsuario->insertUser();
            
        }
        
    }


}


// include __DIR__.'/includes/header.php';
include __DIR__.'/includes/form-login.php';
// include __DIR__.'/includes/footer.php';

?>