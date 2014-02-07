<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index () {

		$this->load->model('atividade');

		$dados['atividades'] = $this->atividade->listar();

		// chamando a view da listagem

		$this->load->view('listaAtividades', $dados);

	}

	public function incluirAtividade () {

		try {

			$this->load->model('atividade');

			$this->atividade->titulo			= trim($_POST['tituloAtividade']);
			$this->atividade->descricao		= trim($_POST['descricaoAtividade']);

			$this->atividade->incluir();

		}

		catch (Exception $e) {

			$dados['msgErro'] = $e->getMessage();

		}

		echo json_encode($dados);

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

	public function modalEditarAtividade () {

		$this->load->model('atividade');

		$dados['idAtividade'] = $_POST['id_atividade'];

		$this->atividade->carregar($_POST['id_atividade']);

		$dados['tituloAtividade']			= $this->atividade->titulo;
		$dados['descricaoAtividade']	= $this->atividade->descricao;

		$this->load->view('modalEditarAtividade', $dados);

	}

}

/* End of file main.php */
/* Location: ./application/controllers/main.php */