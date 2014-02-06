<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Testes extends CI_Controller {

	public function index () {

		$this->load->model('atividade');

		$lista = $this->atividade->listar();

		echo '<pre>';
		print_r($lista);
		echo '</pre>';

	}

}

/* End of file testes.php */
/* Location: ./application/controllers/testes.php */