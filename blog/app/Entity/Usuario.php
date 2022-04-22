<?php

namespace App\Entity;

use App\Db\Database;
use \PDO;

class Usuario{

        /** identificador
         * @var integer
         */
        public $id;
        
        /** Nome do usuario
         * @var string
         */
        public $nome;

        /** Email do usuario
         * @var string
         */
        public $email;

        /** Senha do Usuário
         * @var integer
         */
        public $senha;

        /**
         * Inserindo novo usuário no banco
         * @return boolean
         */
        public function insertUser() {
            $obdatabase = new Database('usuarios');

            // Inserindo um novo usuário
            $this->id = $obdatabase->insert([
                'nome' => $this->nome,
                'email' => $this->email,
                'senha' => $this->senha
            ]);

            return true;
        }

        /**
         * @param string $email
         * @return Usuario
         */
        public static function getUserByEmail($email) {
            return (new Database('usuarios'))->select('email = "'.$email.'"')->fetchObject(self::class);
        }
      
    }

?>