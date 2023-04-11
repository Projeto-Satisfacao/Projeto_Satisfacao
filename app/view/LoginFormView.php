<?php

// Inclui o arquivo autoload para carregar as classes do sistema
require_once("../../autoload.php");

// Informações de login do usuário
$email = $_POST['email'];
$password = md5($_POST['password']);

// Instancia um objeto da classe UserController e envia os dados de login do usuário para o controller realizar as validações
$userController = ((new \App\Controller\UserController())->getLoginFormData($email, $password));
