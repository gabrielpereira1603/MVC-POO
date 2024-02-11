<?php

namespace app\Controller\Pages; 

use \app\Utils\View;    
use \app\Model\Entity\Organization;

class Home extends Page{
        /**
     * Metodo reponsavel por reotrnar o conteudo da (view) de home
     * @return string
     */
    public static function getHome(){

        $obOrganization = new Organization;

        $content = View::render('Pages/home', 
        [
            'name' => $obOrganization->name,//puxa os dados da organization
        ]);
        
        return parent::getPage('Somos Devs', $content);
    }
}