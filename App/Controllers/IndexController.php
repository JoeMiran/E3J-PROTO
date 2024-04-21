<?php

namespace App\Controllers;

use MF\Controller\Action;

class IndexController extends Action {

	public function index() {
		$this->render('Pages/index', 'index');
	}

	public function sobreNos() {
		
		$this->view->dados = array('Notebook', 'Smartphone');
		$this->render('sobreNos', 'layout2');
	}

}


?>