<!DOCTYPE html>

<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Título -->
	<title>Atividades</title>
	<!-- Estilos -->
	<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap-responsive.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/main.css">
	<!-- Scripts -->
	<script src="<?=base_url()?>assets/js/jquery-1.3.2.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?=base_url()?>assets/js/jquery-ui-1.7.1.custom.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?=base_url()?>assets/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?=base_url()?>assets/js/main.js" type="text/javascript" charset="utf-8" async defer></script>

	<script>

	var urlBase = 'http://localhost/projects/tt-bdr/';

	$(document).ready(function() {

		$(function() {

			$(".container ul").sortable({

				opacity: 0.6, cursor: 'move', update: function() {

					var order = $(this).sortable("serialize");

					$.post(urlBase + 'main/atualizarOrdem', order, function(theResponse){

						$("#resposta").html(theResponse);

					});

				}

			});

		});

	});

	</script>

</head>

<body>

	<section class="container">

		<h1>Lista de Atividades</h1>

			<ul>

				<?php foreach ($atividades as $atividade) : ?>

					<?php if ($atividade->estado == 1) : ?>

						<li id="ativ_<?=$atividade->id_atividade?>" style="opacity: 0.8;">

					<?php else : ?>

						<li id="ativ_<?=$atividade->id_atividade?>">

					<?php endif ?>

						<?php if ($atividade->estado == 1) : ?>

							<button class="btn btn-success btn-mini" disabled><i class="icon-ok"></i></button>&nbsp;

						<?php else : ?>

							<button class="btn btn-warning btn-mini"><i class="icon-ok"></i></button>&nbsp;

						<?php endif ?>

						<b><?=$atividade->titulo?></b> : <?=$atividade->descricao?>

						<div class="btn-group">

							<?php if ($atividade->estado == 1) : ?>

								<button class="btn btn-mini" disabled>Editar</button>
								<button class="btn btn-mini">Excluir</button>

							<?php else : ?>

								<button class="btn btn-mini">Editar</button>
								<button class="btn btn-mini">Excluir</button>

							<?php endif ?>

						</div>

					</li>

				<?php endforeach ?>

			</ul>

	</section>

	<div id="resposta"></div>

</body>

</html>