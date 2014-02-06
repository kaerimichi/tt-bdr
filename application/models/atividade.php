<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Atividade extends CI_Model {

	private		$id_atividade;
	public		$titulo;
	public		$descricao;
	public		$data_inclusao;
	public		$estado;
	public		$posicao_lista;

	/**
	 * Inclui uma atividade
	 *
	 * @return		null
	 */

	public function incluir () {

		// definindo a data de inclusão automaticamente

		$this->data_inclusao = date("Y-m-d H:i:s");

		// verifica as informações do objeto

		foreach ($this as $nome_campo => $valor) {

			// verificando o título, ítem obrigatório

			if ($nome_campo == 'titulo') {

				if ($valor == NULL || !is_string($valor)) {

					throw new Exception('O título informado é inválido. Cadastro cancelado.');

				}

			}

			// verificando o valor atual

			if ($valor <> NULL) {

				$campos[]		= $nome_campo;
				$valores[]	= "'" . $valor . "'";

			}

		}

		// montando o array para o SQL após as verificações de conteúdo

		$campos		= implode(', ', $campos);
		$valores	= implode(', ', $valores);

		if ($this->titulo <> NULL) {

			$sql = "INSERT INTO atividade ($campos) VALUES ($valores);";

			if (!$this->db->query($sql)) {

				throw new Exception('Ocorreu um erro ao incluir a atividade.');

			}

		}

		return NULL;

	}

	/**
	 * Carrega as informações de uma atividade
	 *
	 * @return		null
	 */

	public function carregar () {

		// consulta a atividade

		$sql = "SELECT * FROM atividade WHERE id_atividade = '$this->id_atividade';";

		$query = $this->db->query($sql);

		// carregando informações da atividade no objeto

		if ($query->num_rows() > 0) {

			$row = $query->row();

			$this->titulo					= $row->titulo;
			$this->descricao			= $row->descricao;
			$this->data_inclusao	= $row->data_inclusao;
			$this->estado					= $row->estado;

		}

		return NULL;

	}

	/**
	 * Atualiza as informações de uma atividade
	 *
	 * @return		null
	 */

	public function atualizar () {

		//

	}

	/**
	 * Exclui uma atividade
	 *
	 * @return		null
	 */

	public function excluir () {

		$sql = "DELETE FROM atividade WHERE id_atividade = '$this->id_atividade';";

		// verifica se a consulta foi executada com sucesso

		if (!$this->db->query($sql)) {

			throw new Exception('Ocorreu um erro ao excluir a tarefa selecionada.');

		}

		return NULL;

	}

	/**
	 * Lista as atividades
	 *
	 * @param			integer		$id_atividade			Código da atividade
	 * @return		object
	 */

	public function listar ($parametros) {

		//

	}

	/**
	 * Marca uma atividade como 'feita' (1) ou 'a fazer' (0)
	 * Se apenas o ID da atividade for informado, marca como 'feita' (1)
	 *
	 * @param			integer		$id_atividade			Código da atividade
	 * @param			integer		$estado						Estado da atividade
	 * @return		null
	 */

	public function marcar_atividade ($id_atividade, $estado = 1) {

		// verifica se o ID da atividade foi informado

		if ($id_atividade <> NULL && is_integer($id_atividade)) {

			// verifica se foi informado um estado válido

			if ($estado == 0 || $estado == 1) {

				$sql = "UPDATE atividade SET estado = '$estado';";

			} else {

				throw new Exception('Ocorreu um erro com o parâmetro informado.');

			}

		} else {

			throw new Exception('Não foi informada uma atividade válida.');

		}

		return NULL;

	}

	/**
	 * Atualiza a lista de atividades, revendo as posições
	 *
	 * @param			array			$ordenacao				Ordem das atividades
	 * @return		null
	 */

	public function atualizar_ordenacao ($ordenacao) {

		return NULL;

	}

}

/* End of file atividade.php */
/* Location: ./application/models/atividade.php */