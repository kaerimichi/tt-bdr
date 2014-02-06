<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index () {

		$this->load->model('atividade');

		$dados['atividades'] = $this->atividade->listar();

		// chamando a view da listagem

		$this->load->view('lista_atividades', $dados);

	}

	public function atualizarOrdem () {

		$this->load->model('atividade');

		$this->atividade->atualizar_ordenacao($_POST['ativ']);

	}

}

/* End of file main.php */
/* Location: ./application/controllers/main.php */