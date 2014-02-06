<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index () {

		$dados = NULL;

		// chamando a view da listagem

		$this->load->view('lista_atividades', $dados);

	}

}

/* End of file main.php */
/* Location: ./application/controllers/main.php */