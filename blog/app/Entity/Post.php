<?php

namespace App\Entity;

use App\Db\Database;
use \PDO;

class Post{

        /** identificador
         * @var integer
         */
        public $id;
        
        /** Título da postagem
         * @var string
         */
        public $title;

        /** Categoria da postagem
         * @var integer
         */
        public $category;

        /** Descrição da postagem
         * @var string
         */
        public $description;

        /** Data da postagem
         * @var string
         */
        public $date;

        
        /**
         * Para poder registrar uma nova postagem
         * @return boolean
         */
        public function register(){
            //DEFINIR A DATA
            $this->date = date('Y-m-d H:i');

            //Inserir postagem no banco
            $obDatabase = new Database('postagens');
            $this->id = $obDatabase->insert([
                                            'title' =>          $this->title,
                                            'category' =>       $this->category,
                                            'description' =>    $this->description,
                                            'date' =>           $this->date
                                            ]);
            // echo "<pre>"; print_r($this); echo "</pre>"; exit;                                            

            //RETORNAR SUCESSO
            return true;
        }

        /**
         * Com este método vou atualizar a postagem no banco de dados
         * @return boolean
         */
        public function atualizar(){
            return (new Database('postagens'))->update('id = '.$this->id,[
                                                                    'title' =>          $this->title,
                                                                    'category' =>       $this->category,
                                                                    'description' =>    $this->description,
                                                                    'date' =>           $this->date
                                                                    ]);
        }

        /**
         * Com este método vou deletar registro do banco de dados
         * @return boolean
         */
        public function deletar(){
            return (new Database('postagens'))->delete('id = '.$this->id);
        }

        /**
         * Método responsável por obter as postagens do banco de dados
         * @param  string $where
         * @param  string $order
         * @param  string $limit
         * @return array
         */
        public static function getPosts($where = null, $order = null, $limit = null){
            return (new Database('postagens'))->select($where,$order,$limit)
                                        ->fetchAll(PDO::FETCH_CLASS,self::class);
        }

        /**
         * Método responsável por buscar as postagens com base em seu ID
         * @param  integer $id
         * @return Post
         */
        public static function getPost($id){
            return (new Database('postagens'))->select('id = '.$id)
                                        ->fetchObject(self::class);
        }
    }

?>