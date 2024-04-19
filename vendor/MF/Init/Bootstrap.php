<?php 

namespace MF\Init;

abstract class Bootstrap {

    private $routes; // Armazena as rotas do aplicativo.

    abstract protected function initRoutes(); // Método abstrato que deve ser implementado pelas classes filhas.

	public function __construct() {
		// Quando uma instância da classe Route é criada, as rotas são inicializadas e a função run é chamada.
		$this->initRoutes();
		$this->run($this->getUrl());
	}

	public function getRoutes() {
		return $this->routes; // Retorna as rotas definidas.
	}

	public function setRoutes(array $routes) {
		$this->routes = $routes; // Define as rotas recebidas como argumento.
	}

    protected function run($url) {
		// Itera sobre todas as rotas definidas para encontrar uma correspondência com a URL atual.
		foreach ($this->getRoutes() as $key => $route) {
			// Se houver uma correspondência, instancia o controlador correspondente e executa a ação correspondente.
			if($url == $route['route']) {
				$class = "App\\Controllers\\".ucfirst($route['controller']); // Obtém o nome do controlador.

				$controller = new $class; //Instancia o controlador.
				
				$action = $route['action']; // Obtém a ação a ser executada.

				$controller->$action(); // Executa a ação do controlador.
			}
		}
	}

    protected function getUrl() {
		return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // Obtém a URL atual da requisição.
	}

}

?>