<?php

// Inclui o arquivo autoload para carregar as classes do sistema
require_once("autoload.php");

// Inicia a sessão
session_start();

// // Verifica se o usuário fez login
// if(!isset($_SESSION['usuario'])) {
//   // Redirecionar para a página de login se o usuário não estiver logado
//   header("Location: index-login.html"); 
//   exit;
// }

// if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) {
//   // Usuário é administrador
// } else {
//   // Usuário comum
// }

//--------------------------------------------------------------------------------------------
/**
*  Teste unitário para criação de um usuário
*  @param string $username - Nome de usuário
*  @param string $email - Email
*  @param string $password - Senha
*  @param int $status - Status de administrador (0 = usuário comum, 1 = administrador)
*  @return boolean - Verdadeiro se a criação tiver sido realizada, falso caso a criação tiver falhado
*/

// Valores que vão ser cadastrados
$data = array(
  'username' => 'luish',
  'email' => 'luish@ba.estudante.senai.br',
  'password' => md5('12345678'),
  'status' => 1
);

// Instancia um objeto da classe UserController e envia os dados do usuário para o controller realizar as validações e salvar no banco de dados
$createUser = (new \App\Controller\UserController())->store($data);
var_dump($createUser);

// Retorno da criação
//$resultado = ($createUser) ? 'Criação de usuário realizada.' : 'Criação de usuário falhou.';
//var_dump($resultado);