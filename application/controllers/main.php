<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index () {

		$this->load->model('atividade');

		$dados['atividades'] = $this->atividade->listar();

		// chamando a view da listagem

		$this->load->view('listaAtividades', $dados);

	}

	public function marcarAtividade () {

		try {

			$this->load->model('atividade');

			$this->atividade->marcar($_POST['id_atividade']);

		}

		catch (Exception $e) {

			$dados['msgErro'] = $e->getMessage();

		}

		echo json_encode($dados);

	}

	public function excluirAtividadesFinalizadas () {

		$this->load->model('atividade');

		$this->atividade->excluirFinalizadas();

	}

	public function excluirAtividade () {

		try {

			$this->load->model('atividade');

			$this->atividade->set_id_atividade($_POST['id_atividade']);

			$this->atividade->excluir();

		}

		catch (Exception $e) {

			$dados['msgErro'] = $e->getMessage();

		}

		echo json_encode($dados);

	}

	public function atualizarOrdem () {

		$this->load->model('atividade');

		$this->atividade->atualizar_ordenacao($_POST['ativ']);

	}

	public function modalNovaAtividade () {

		$this->load->view('modalNovaAtividade');

	}

}

/* End of file main.php */
/* Location: ./application/controllers/main.php */