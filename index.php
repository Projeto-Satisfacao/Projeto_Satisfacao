<?php

// Inclui o arquivo autoload para carregar as classes do sistema
require_once("autoload.php");

// Inicia a sessão
session_start();

// Verifica se o usuário fez login
if(!isset($_SESSION['usuario'])) {
  // Redirecionar para a página de login se o usuário não estiver logado
  header("Location: pages/index-login.html"); 
  exit;
}

if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) {
  // Usuário é administrador
} else {
  // Usuário comum
}