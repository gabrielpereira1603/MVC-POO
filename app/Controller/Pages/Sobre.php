<?php

namespace app\Controller\Pages; 

use \app\Utils\View;    
use \app\Model\Entity\Organization;

class Sobre extends Page{
    /**
     * Metodo responsavevl por retornar o conteudo (view) da nossa pagina Sobre
     */
    public static function getSobre(){

        $obOrganization = new Organization;

        $content = View::render('Pages/sobre', 
        [
            'name' => $obOrganization->name,
            'descricao' => $obOrganization->descricao,
        ]);
        
        return parent::getPage('Somos devs - sobre', $content);
    }
}