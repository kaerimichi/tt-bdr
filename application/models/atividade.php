<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Atividade extends CI_Model {

	private		$id_atividade;
	public		$titulo;
	public		$descricao;
	public		$data_inclusao;
	public		$estado;
	public		$posicao_lista;

	// - - - - - - - - - - -

	public function set_id_atividade ($val) {

		$this->id_atividade = $val;

	}

	public function get_id_atividade () {

		return $this->id_atividade;

	}

	// - - - - - - - - - - -

	/**
	 * Inclui uma atividade
	 *
	 * @return		null
	 */

	public function incluir () {

		// definindo a data de inclusão automaticamente

		$this->data_inclusao = date("Y-m-d H:i:s");

		// definindo a posição da atividade como última da lista

		$sql = "SELECT MAX(posicao_lista) AS posicao FROM atividade;";

		$query = $this->db->query($sql);

		// verifica se há algum item na lista pra contar

		if ($query->num_rows() > 0) {

			$row = $query->row();

			$this->posicao_lista = $row->posicao + 1;

		} else {

			$this->posicao_lista = 1;

		}

		// verifica as informações do objeto

		foreach ($this as $nome_campo => $valor) {

			// verificando o título, ítem obrigatório

			if ($nome_campo == 'titulo') {

				if ($valor == NULL || !is_string($valor)) {

					throw new Exception('O título informado é inválido.');

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
			$this->posicao_lista	= $row->posicao_lista;

		}

		return NULL;

	}

	/**
	 * Atualiza as informações de uma atividade
	 *
	 * @return		null
	 */

	public function atualizar () {

		// verifica se pelo menos o título foi informado

		if ($this->titulo <> NULL && is_string($this->titulo)) {

			$sql = "UPDATE atividade SET titulo = '$this->titulo', descricao = '$this->descricao' WHERE id_atividade = '$this->id_atividade';";

			if (!$this->db->query($sql)) {

				throw new Exception('Ocorreu um erro ao gravar suas alterações.');

			}

		} else {

			throw new Exception('Parece que você não forneceu um título válido. Tente novamente.');

		}

		return NULL;

	}

	/**
	 * Exclui uma atividade (marca como excluída)
	 *
	 * @return		null
	 */

	public function excluir () {

		$sql = "UPDATE atividade SET excluido = '1' WHERE id_atividade = '$this->id_atividade';";

		// verifica se a consulta foi executada com sucesso

		if (!$this->db->query($sql)) {

			throw new Exception('Ocorreu um erro ao excluir a tarefa selecionada.');

		}

		return NULL;

	}

	/**
	 * Exclui as atividades finalizadas (marca como excluídas)
	 *
	 * @return		null
	 */

	public function excluirFinalizadas () {

		$sql = "UPDATE atividade SET excluido = '1' WHERE estado = '1';";

		$this->db->query($sql);

		return NULL;

	}

	/**
	 * Lista as atividades
	 *
	 * @return		object
	 */

	public function listar () {

		$sql = "SELECT * FROM atividade WHERE excluido = '0' ORDER BY posicao_lista ASC;";

		$query = $this->db->query($sql);

		return $query->result();

	}

	/**
	 * Marca uma atividade como 'feita' (1) ou 'a fazer' (0)
	 * Se apenas o ID da atividade for informado, marca como 'feita' (1)
	 *
	 * @param			integer		$id_atividade			Código da atividade
	 * @param			integer		$estado						Estado da atividade
	 * @return		null
	 */

	public function marcar ($id_atividade, $estado = 1) {

		// verifica se o ID da atividade foi informado

		if ($id_atividade <> NULL) {

			// verifica se foi informado um estado válido

			if ($estado == 0 || $estado == 1) {

				$sql = "UPDATE atividade SET estado = '$estado' WHERE id_atividade = '$id_atividade';";

				if (!$this->db->query($sql)) {

					throw new Exception('Sua tarefa não pôde ser marcada.');

				}

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

		foreach ($ordenacao as $valor) {

			$sql = "UPDATE atividade SET posicao_lista = '$valor'";

			$this->db->query($sql);

		}

		return NULL;

	}

}

/* End of file atividade.php */
/* Location: ./application/models/atividade.php */