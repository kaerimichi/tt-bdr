<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Webservice extends CI_Controller {

	/**
	 * Carrega as informações e documentação do webservice
	 */

	public function index () {

		$this->load->view('infoWebservice');

	}

	/**
	 * Recebe o recordset em JSON ($_POST['recordset']) e inclui
	 * a atividade no banco
	 */

	public function incluir () {

		$recordset = json_decode($_POST['recordset']);

		$this->load->model('atividade');

		$this->atividade->titulo			= $recordset->titulo;
		$this->atividade->descricao		= $recordset->descricao;

		$this->atividade->incluir();

		return NULL;

	}

	/**
	 * Devolve o recordset em JSON, carregando as informações da atividade
	 * correspondente ao ID informado em $_POST['id_atividade']
	 */

	public function carregar () {

		$this->load->model('atividade');

		$this->atividade->set_id_atividade($_POST['id_atividade']);

		$this->atividade->carregar();

		$recordset = $this->atividade;

		return json_encode($recordset);

	}

	/**
	 * Atualiza as informações da atividade informada ($_POST['id_atividade'])
	 * com as informações passadas em $_POST['recordset']
	 */

	public function atualizar () {

		$recordset = json_decode($_POST['recordset']);

		$this->load->model('atividade');

		$this->atividade->set_id_atividade($_POST['id_atividade']);

		$this->atividade->titulo			= $recordset->titulo;
		$this->atividade->descricao		= $recordset->descricao;

		$this->atividade->atualizar();

		return NULL;

	}

	/**
	 * Excluir uma atividade, com base no ID informado ($_POST['id_atividade'])
	 */

	public function excluir () {

		$this->load->model('atividade');

		$this->atividade->set_id_atividade($_POST['id_atividade']);

		$this->atividade->excluir();

		return NULL;

	}

	/**
	 * Retorna uma lista de atividades
	 */

	public function listar () {

		$this->load->model('atividade');

		$recordset = $this->atividade->listar();

		return json_encode($recordset);

	}

}

/* End of file webservice.php */
/* Location: ./application/controllers/webservice.php */