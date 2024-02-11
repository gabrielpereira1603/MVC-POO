<?php

namespace app\Model\Entity;
use \WilliamCosta\DatabaseManager\Database;

class Depoimento {

    /**
     * ID do depoimentos
     * @var int
     */
    public $id;

    /**
     * Nome do usuario que fez depoimento
     * @var string
     */
    public $nome;

    /**
     * Mensagem do depoimentos
     * @var string
     */
    public $mensagem;

    /**
     * Data de publicacao do depoeimento
     * @var string
     */
    public $data;

    /**
     * Metodo responsavel por cadastra a instancia atual do banco de dados
     * @return boolean
     */
    public function cadastrar(){
        //DEFINE A DATA
        $this->data = date('Y-m-d H:i:s');

        //INSERE O DEPOIMENTO NO BANCO DE DADOS
        $this->id = (new Database('depoimentos'))->insert([
            'nome'      => $this->nome,
            'mensagem'  => $this->mensagem,
            'data'      => $this->data
        ]);

        //SUCCESO
        return true;
    }

    /**
    //  * Metodo responsavel por retornar depoimentos
    //  * @param string $where
    //  * @param string $order
    //  * @param string $limit
    //  * @param string $fiel
    //  * @return //PDOStatement
     */
    public static function getDepoimentos($where = [], $older = null, $limit = null, $fields = '*') {
        return (new Database('depoimentos'))->select($where,$older,$limit,$fields);
    }
}