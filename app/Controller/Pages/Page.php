<?php

namespace app\Controller\Pages; 

use \app\Utils\View;    

class Page{

    /**
     * Metodo responsavel por renderizar o topo da pagina
     * @return string
     */
    private static function getHeader() {
        return View::render('Pages/header');
    }
        /**
     * Metodo responsavel por renderizar o footer da pagina
     * @return string
     */
    private static function getFooter() {
        return View::render('Pages/footer');
    }

    /**
     * Metodo responsavel por renderizar o layout de paginacao
    //  * @param Request $request
    //  * @param Pagination $obPagination
     * @return string
     */
    public static function getPagination($request,$obPagination) {
        //PAGINAS
        $pages = $obPagination->getPages();

        //VERIFICA A QUANTIDADE DE PAGINAS
        if(count($pages) <= 1) return '';

        //LINKS
        $links = '';

        //URL ATUAL (SEM GETS)
        $url = $request->getRouter()->getCurrentUrl();

        //GET
        $queryParams = $request->getQueryParams();

        //RENDERIZA OS LINKS
        foreach($pages as $page) {
            //ALTERA A PAGINA
            $queryParams['page'] = $page['page'];
            
            //LINK
            $link = $url.'?'.http_build_query($queryParams);

            //VIEW
            $links .= View::render('Pages/pagination/link', [
                'page' => $page['page'],
                'link' => $link,
                'active' => $page['current'] ? 'active' : ''
            ]);
        }

        //RENDERIZA BOX DE PAGINACAO
        return View::render('Pages/pagination/box', [
            'links' => $links
        ]);
    }
    /**
     * Metodo responsavel por retorna o conteudo da (view) da nossa pagina generica
     */
    public static function getPage($title, $content){
        return View::render('Pages/page', 
            [
                'title' => $title,
                'header' => self::getHeader(),
                'content' => $content,
                'footer' => self::getFooter()
            ]);
    }
}