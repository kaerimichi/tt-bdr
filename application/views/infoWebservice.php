<!DOCTYPE html>

<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Título -->
	<title>Informações do Webservice</title>
	<!-- Estilos -->
	<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap-responsive.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/main.css">
	<!-- Scripts -->
	<script src="<?=base_url()?>assets/js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?=base_url()?>assets/js/jquery-ui-1.7.1.custom.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?=base_url()?>assets/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>

</head>

<body>

	<section class="container">

		<div class="btn-group grupo_botoes_direita">

			<button class="btn btn-small btn-primary" onclick="window.location='<?=base_url()?>'">Voltar às Atividades</button>
			<button class="btn btn-small" onclick="print()">Imprimir</button>

		</div>

		<h3>Web Service</h3>

		<h5>Inclusão de Atividade : incluir()</h5>

		<p>URL: <?=base_url()?>webservice/incluir</p>
		<p>Parâmetros: $_POST['recordset'], objeto JSON</p>

		<pre>{ "titulo" : "Título da Atividade", "descricao" : "Descrição da Atividade" }</pre>

		<p>Retorno: nulo</p>

		<pre>null</pre>

		<hr>

		<h5>Carregamento da Atividade : carregar()</h5>

		<p>URL: <?=base_url()?>webservice/carregar</p>
		<p>Parâmetros: $_POST['id_atividade']</p>

		<pre>3</pre>

		<p>Retorno: objeto JSON</p>

		<pre>{ "titulo" : "Título da Atividade 3", "descricao" : "Descrição da Atividade 3" }</pre>

		<hr>

		<h5>Atualização das Informações da Atividade : atualizar()</h5>

		<p>URL: <?=base_url()?>webservice/atualizar</p>
		<p>Parâmetros: $_POST['id_atividade']; $_POST['recordset'], objeto JSON</p>

		<pre>3</pre>
		<pre>{ "titulo" : "Título da Atividade 3", "descricao" : "Descrição da Atividade 3" }</pre>

		<p>Retorno: nulo</p>

		<pre>null</pre>

		<hr>

		<h5>Exclusão da Atividade : excluir()</h5>

		<p>URL: <?=base_url()?>webservice/excluir</p>
		<p>Parâmetros: $_POST['id_atividade']</p>

		<pre>3</pre>

		<p>Retorno: nulo</p>

		<pre>null</pre>

		<hr>

		<h5>Listagem das Atividades : listar()</h5>

		<p>URL: <?=base_url()?>webservice/listar</p>
		<p>Parâmetros: nulo</p>

		<pre>null</pre>

		<p>Retorno: objeto JSON (com todos os registros)</p>

		<pre>{ [ "titulo" : "Título da Atividade", "descricao" : "Descrição da Atividade" ], [ "titulo" : "Título da Atividade 3", "descricao" : "Descrição da Atividade 3" ] }</pre>

	</section>

</body>

</html>