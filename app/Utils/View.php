<?php

namespace app\Utils;

class View {
    //metodo para retornar o conteudo de uma view
    //@param string view
    //@return string
    private static function getConteudoView($view){
        $file = __DIR__ .'/../../resources/view/'.$view.'.html';
        return file_exists($file) ? file_get_contents($file) :'';
    }

    //Metodo responsavel por retorna o conteudo renderizado da view
    //@param string view
    //@param string/numeric
    //@return string
    public static function render($view, $vars = []) {
        //conteudo da view
        $conteudoView = self::getConteudoView($view);

        //chaves do array de variaveis
        $keys = array_keys($vars);
        $keys = array_map(function($item){
            return '{{'.$item.'}}';
        }, $keys);

        //reotrna o conteudo renderizado
        return str_replace($keys,array_values($vars), $conteudoView);
    }
}