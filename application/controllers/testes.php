<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Testes extends CI_Controller {

	public function index () {

		$this->load->model('atividade');

		$this->atividade->listar();

	}

}

/* End of file testes.php */
/* Location: ./application/controllers/testes.php */