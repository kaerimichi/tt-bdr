<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Webservice extends CI_Controller {

	public function incluir () {

		$recordset = json_decode($POST['recordset']);

		$this->load->model('atividade');

		$this->atividade->titulo			= $recordset->titulo;
		$this->atividade->descricao		= $recordset->descricao;

		$this->atividade->incluir();

		return NULL;

	}

	public function carregar () {

		$this->load->model('atividade');

		$this->atividade->set_id_atividade($_POST['id_atividade']);

		$this->atividade->carregar();

		$recordset = $this->atividade;

		return json_encode($recordset);

	}

	public function atualizar () {

		$recordset = json_decode($POST['recordset']);

		$this->load->model('atividade');

		$this->atividade->set_id_atividade($_POST['id_atividade']);

		$this->atividade->titulo			= $recordset->titulo;
		$this->atividade->descricao		= $recordset->descricao;

		$this->atividade->atualizar();

		return NULL;

	}

	public function excluir () {

		$this->load->model('atividade');

		$this->atividade->set_id_atividade($_POST['id_atividade']);

		$this->atividade->excluir();

		return NULL;

	}

	public function listar () {

		$this->load->model('atividade');

		$recordset = $this->atividade->listar();

		return json_encode($recordset);

	}

}

/* End of file webservice.php */
/* Location: ./application/controllers/webservice.php */