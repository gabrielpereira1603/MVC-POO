<?php
namespace app\Controller\Admin;

use \app\Utils\View;

class Page {

    /**
     * Metodo responsavel por retornar o conteudo (view) da estrutura generica de pagina do painel
     * @param string
     * @param string
     * @return string
     */
    public static function getPage($title,$content) {
        return View::render('admin/page',[
            'title'=> $title,
            'content'=> $content,
        ]);
    }
}