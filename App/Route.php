<?php

namespace App;

use MF\Init\Bootstrap;

/*Optei por criar uma classe Route que extende a classe Bootstrap, pois acredito que a 
classe Route deve ser responsável por definir as rotas do aplicativo, que seriam seus requisitos funcionais.
*/
class Route extends Bootstrap {

	protected function initRoutes() {
		// Define as rotas iniciais do aplicativo.
		$routes['home'] = array(
			'route' => '/', // Rota para a página inicial.
			'controller' => 'indexController', // Controlador responsável pela página inicial.
			'action' => 'index' // Ação a ser executada para a página inicial.
		);

		$routes['sobre_nos'] = array(
			'route' => '/sobre_nos', // Rota para a página "Sobre Nós".
			'controller' => 'indexController', // Controlador responsável pela página "Sobre Nós".
			'action' => 'sobreNos' // Ação a ser executada para a página "Sobre Nós".
		);

		$this->setRoutes($routes); // Define as rotas inicializadas no objeto Route.
	}

}

?>