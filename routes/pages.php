<?php

use \app\Http\Response;
use \app\Controller\Pages;

//ROTA HOME
$obRouter->get('/', [
    function() {
        return new Response(200,Pages\Home::getHome());
    }
]);

//ROTA SOBRE
$obRouter->get('/sobre', [
    function() {
        return new Response(200,Pages\Sobre::getSobre());
    }
]);

//ROTA DEPOIMENTOS
$obRouter->get('/depoimentos', [
    function($request) {
        return new Response(200,Pages\Depoimento::getDepoimentos($request));
    }
]);

//ROTA DEPOIMENTOS (insert)
$obRouter->post('/depoimentos', [
    function($request) {

        return new Response(200,Pages\Depoimento::insertDepoimento($request));
    }
]);

// //ROTA DINAMICA
// $obRouter->get('/pagina/{idPagina}/{acao}', [
//     function($idPagina, $acao) {
//         return new Response(200, 'Página'. $idPagina.' - '.$acao);
//     }
// ]);
