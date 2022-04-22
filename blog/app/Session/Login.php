<?php

namespace App\Session;

class Login {

    /**
     * Iniciando a sessão
     */
    private static function init(){
        if(session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        };
    }

    // Retorna dados do usuario logado
    public function getUserLogged() {
        // inicia a sessão
        self::init();

        return self::isLogged() ? $_SESSION['usuario'] : null;
    }

    public static function login($obUsuario){
        // inicia a sessão 
        self::init();

        // sessão de usuário
        $_SESSION['usuario'] = [
            'id' => $obUsuario->id,
            'nome' => $obUsuario->nome,
            'email' => $obUsuario->email,
        ];
       // Redireciona para index  
        header('location: index.php');
        exit;
    }

    public static function logout() {
        // inicia a sessão 
        self::init();

        // Remove a sessão do usuário
        unset($_SESSION['usuario']);

        // Redireciona o usuario para login
        header('location: login.php');
        exit;
    }

    /**
     * Primeiro saber se o usuário está logado
     * @return boolean
     */
    public static function isLogged(){
        // inicia a sessão 
        self::init();

        return isset($_SESSION['usuario']['id']);
    }

    /**
     * Segundo Obrigar o usuário a estar "logado" para poder acessar o site
     */
    public static function requireLogin(){
        if(!self::isLogged()) {
            header('location: login.php');
            exit;
        }
    }

    /**
     * Terceiro Obrigar o usuário a estar "deslogado" para poder acessar o site
     */
    public static function requireLogout(){
        if(self::isLogged()) {
            header('location: index.php');
            exit;
        }
    }
}

?>