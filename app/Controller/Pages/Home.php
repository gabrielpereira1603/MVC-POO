<?php

namespace app\Controller\Pages; 

use \app\Utils\View;    
use \app\Model\Entity\Organization;

class Home extends Page{
    public static function getHome(){

        $obOrganization = new Organization;

        $content = View::render('Pages/home', 
        [
            'name' => $obOrganization->name,
            'descricao' => $obOrganization->descricao
        ]);
        
        return parent::getPage('somos devs', $content);
    }
}