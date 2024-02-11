<?php

namespace app\Controller\Pages; 

use \app\Utils\View;    
use \app\Model\Entity\Depoimento as EntityDepoimento;
USE \WilliamCosta\DatabaseManager\Pagination;

class Depoimento extends Page{

    /**
     * Metodo responsavel por obter a rendericacao dos itens de depoimento para a pagina
     * @param Resquest $request
     * @param Pagination $obPagination
     * @return string
     */
    private static function getDepoimentoItems($request,&$obPagination){
        //DEPOIMENTOS
        $itens = '';

        //QUANTIDADE TOTAL DE REGISTRO
        $quantidadetotal = EntityDepoimento::getDepoimentos(null,null,null,'COUNT(*) as qtd')->fetchObject()->qtd;

        //PAGINA ATUAL
        $queryParams = $request->getQueryParams();
        $paginaAtual = $queryParams['page'] ?? 1;

        //INSTANCIA DE PAGINACAO
        $obPagination = new Pagination($quantidadetotal,$paginaAtual,3);

        //RESULTADOS DA PAGINA
        $results = EntityDepoimento::getDepoimentos(null, 'id DESC',$obPagination->getLimit());

        //RENDERIZA O ITEM
        while($obDepoimento = $results->fetchObject(EntityDepoimento::class)){
            // echo '<pre>';
            // print_r($obDepoimento);
            // echo '<pre>';exit;
            $itens .= View::render('Pages/depoimento/item', [
                'nome'      => $obDepoimento ->nome,
                'mensagem'  => $obDepoimento ->mensagem,
                'data'      => date('d/m/Y H:i:s', strtotime($obDepoimento->data))
            ]);
        }

        //RETORNA OS DEPOIMENTOS
        return $itens;
    }

    /**
     * Metodo reponsavel por reotrnar o conteudo da (view) de depoimentos
     * @param Request $request
     * @return string
     */
    public static function getDepoimentos($request){
        //VIEW DE DEPOIMENTOS
        $content = View::render('Pages/depoimentos', [
            'itens' => self::getDepoimentoItems($request,$obPagination),
            'pagination' =>parent::getPagination($request,$obPagination)
        ]);
        
        return parent::getPage('Depoimentos > Somos Devs', $content);
    }
    /**
     * Metodo responsavel por cadastra um depoimento
     * @param //Request $request
     * @return string
     */
    public static function insertDepoimento($request){
        //DADOS DO POST
        $postVars = $request->getPostVars();

        //NOVA INSTANCIA DE DEPOIMENTO
        $obDepoimento = new EntityDepoimento();
        $obDepoimento->nome = $postVars['nome'];
        $obDepoimento->mensagem = $postVars['mensagem'];
        $obDepoimento->cadastrar();

        //RETORNA A PAGINA DE LISTAGEM DE DEPOIMENTO
        return self::getDepoimentos($request);
    }
}