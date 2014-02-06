// JavaScript Principal

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

function excluirFinalizadas () {

	if (confirm('Deseja eliminar da lista as tarefas finalizadas?')) {

		$.post(

			urlBase + 'main/excluirAtividadesFinalizadas',

			function (data) {

				window.location = urlBase;

			}

		);

	}

}

function marcarAtividade (id_atividade) {

	$.post(

		urlBase + 'main/marcarAtividade',

		{ 'id_atividade' : id_atividade },

		function (data) {

			if (data !== null) {

				alert(data.msgErro);

			} else {

				window.location = urlBase;

			}

		},

		'json'

	);

}

function excluirAtividade (id_atividade) {

	if (confirm('Tem certeza que deseja excluir esta atividade?')) {

		$.post(

			urlBase + 'main/excluirAtividade',

			{ 'id_atividade' : id_atividade },

			function (data) {

				if (data !== null) {

					alert(data.msgErro);

				} else {

					window.location = urlBase;

				}

			},

			'json'

		);

	}

}

function modalNovaAtividade () {

	$('.modalPlaceholder').load(

		urlBase + 'main/modalNovaAtividade',

		function () {

			$('#modalNovaAtividade').modal('show');

		}

	);

}