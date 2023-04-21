<!DOCTYPE html>
<html lang="Pt-Br">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0" />
	<meta http-equiv="X-UA-compatible" content="IE=Edge" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro">
	<link rel="stylesheet" href="../assets/css/modalcss/style.css" />
	<link rel="stylesheet" href="../assets/css/modalcss/modal.css">
	<title>Cadastros</title>
	<style>
		/**
		* Tudo abaixo é referente aos modais/Pop-ups
		*/

		.custom-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9999;
            text-align: center;
            padding-top: 100px;
        }
        .custom-modal-content {
            display: inline-block;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px #000;
        }


		body, .button-modal {
			display: grid;
			justify-content: center;
			align-items: center;
			margin-top: 20px;
		}

		.cad-container {
			margin-top: 150vh;
		}

		.button-modal {
			width: 300px;
			height: 8vh;
			font-size: 23px;
			min-height: 14bh;
			min-width: 250px;
		}

		h2 {
			text-align: center;
		}

		label {
			font-weight: bold;
		}

		dialog {
			margin-top: 15vh;
			margin-left: 35vh;
			display: grid;
			justify-content: center;
			align-items: center;
			height: 100%;
		}
		
		/**
		* Responsividade da janela modal
		*/
		@media screen and (max-width: 885px) {
    		.cad-container {
				margin-right: -18.5vh;
      		}
		}
		@media screen and (max-height: 720px) {
    		dialog {
				display: grid;
				margin-top: 10vh;
      		}
    	}
		@media screen and (max-height: 610px) {
    		dialog {
				display: grid;
				margin-top: 1vh;
      		}
    	}
		@media screen and (max-height: 476px) {
    		.button-modal {
				height: 12vh;
			}
			.cad-container {
				margin-top: 135vh;
			}
    	}
	</style>
</head>

<body>
	<?php include_once("index-menu.html") ?>
	<div class="cad-container">
		<h2>Cadastros</h2>

		<!--Botões com opções de ações para administrador do sistema-->
		<button class="button-modal" id="setLocal">Cadastrar Local</button>
		<button class="button-modal" id="setSetor">Cadastrar Setor</button>
		<button class="button-modal" id="setUsuario">Cadastrar Usuário</button>
		<section class="modal-bg">
			<dialog id="id01" class="modal">
				<span class="close" title="Close Modal">×</span>
				<form name="form" class="modal-content animate" action="../action_page.php" method="post">
					<div class="container">
					</div>
					<div class="clearfix">
						<button type="button" onclick="closeModal()" class="cancelbtn">Cancelar</button>
						<button type="submit" class="signupbtn">Cadastrar</button>
					</div>
				</form>
			</dialog>
		</section>
	</div>
	<script type="module" src="../assets/js/modaljs/script.js"></script>
	<script>


		modalTop = '.modal-bg';
        containerTop = '.container';
        const modalBg = document.querySelector(modalTop);
        const container = document.querySelector(containerTop);

        function clearInputs() {
            if (container) container.innerHTML = '';
        }

        function closeModal() {
            //alert("click");
            modalBg.classList.remove('active');
            clearInputs();
        }

	</script>
</body>

</html>