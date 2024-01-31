<?php

namespace app\Controller\Pages; 

use \app\Utils\View;    

class Page{

    private static function getHeader() {
        return View::render('Pages/header');
    }

    public static function getPage($title, $content){
        return View::render('Pages/page', 
            [
                'title' => $title,
                'header' => self::getHeader(),
                'content' => $content
            ]);
    }
}