<?php

/* Se existir algo no $_GET['aviso] ele atribui isso numa variável que contem a mensagem que vai ser exibida no popup */
if (isset($_GET['aviso'])) { 
    $mensagem = $_GET['aviso'];
	$cor = '#3CB371'; // a cor pode ser uma variável, ou seja, podemos mudar ela dependendo de um IF ou algo assim
?>
    <style>
        .popup {
            background-color: <?= $cor ?>; /* Cor do fundo do popup */
			margin-top: 2vh;
            color: #fff; /* Cor da fonte do popup */
            font-family: "Poppins", sans-serif; /* Fonte do popup */
            font-weight: bold; 
            padding: 10px; 
            position: fixed; 
            top: 0; 
            left: 50%; 
            transform: translateX(-50%); /* left 50% e transform deixam o popup centralizado  */
            animation: fadein 0.5s linear; /* animacao ao aparecer */
            z-index: 9999; /* garante que o popup fique na frente de TUDO */
        }

		/* ANIMAÇÕES */
        @keyframes fadein {
            from { opacity: 0; } 
            to { opacity: 1; } 
        }

        @keyframes fadeout {
            from { opacity: 1; } 
            to { opacity: 0; } 
        }
    </style>

	<!-- o popup -->
    <div class="popup"><?php echo $mensagem; ?></div>

    <script>
		/* Função que faz um cooldown para o popup desaparecer no mesmo estilo em que ele aparece */
        setTimeout(function() {
            var popup = document.querySelector('.popup'); /* atribuindo o popup numa variável */
            popup.style.animation = 'fadeout 0.5s linear'; /* coloca a animação no popup */
            setTimeout(function() { /* remove o popup da tela depois de 5000 milissegundos (5 sec) */
                popup.remove();
            }, 500); /* temp de espera antes de começar a contar o tempo de remover o popup */
        }, 5000); /* tempo de tela do popup */
    </script>
<?php
} // isso daqui é do IF lá de cima
?>
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
	<link rel="icon" type="image/ico" href="../assets/img/ico.ico"/>
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