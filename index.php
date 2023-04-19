<?php

// Inclui o arquivo autoload para carregar as classes do sistema
require_once("autoload.php");

// Inicia a sessão
session_start();

$path = $_SERVER["PATH_INFO"];
extract($_POST);


switch ($path) {
  case '/cadastro':
    try {
      $userData = new stdClass;
      $userData->username = $nomeUsuario;
      $userData->email = $emailUsuario;
      $userData->password = $senhaUsuario;
      $registro = new App\controller\UserController;
      $registro->createUser($userData);
    } 
    catch (\Throwable $th) {
      echo "Não foi possível registrar um novo usuário";
    }
    break;
  
  default:
    # code...
    break;
}

// Verifica se o usuário fez login
// if(!isset($_SESSION['usuario'])) {
//   // Redirecionar para a página de login se o usuário não estiver logado
//   header("Location: telas-front/index-login.html"); 
//   exit;
// }

if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) {
  // Usuário é administrador
} else {
  // Usuário comum
}

