<?php

require __DIR__ .'/includes/app.php';

use \app\Http\Router;

$obRouter = new Router(URL);

//INCLUI AS ROTAS DE PAGINAS
include __DIR__.'/routes/pages.php';

//IMPRIMI O RESPONSE DA ROTA
$obRouter->run()->sendResponse();