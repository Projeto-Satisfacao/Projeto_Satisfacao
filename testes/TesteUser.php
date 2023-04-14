<?php

/**
* Testes unitários da estrutura MVC User
*/

/**
* Teste unitário para login de um usuário
* @param string $email - E-mail
* @param string $password - Senha
* @return boolean - Verdadeiro se a autenticação for bem sucedida, falso caso contrário
*/

// Informações de login
$email = 'emanoel.silva@ba.estudante.senai.br';
$password = md5('12345678');

// Instancia um objeto da classe UserController e envia os dados do usuário para o controller realizar as validações e salvar no banco de dados
$login = (new \App\Controller\UserController())->login($email, $password);
var_dump($login);

// Retorno da criação
$resultado = ($login) ? 'Login realizado.' : 'Não foi possível realizar o login.';
var_dump($resultado);

// --- Fim do Teste unitário para login --


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
  'username' => 'emanoeldias',
  'email' => 'emanoel.dias@ba.estudante.senai.br',
  'password' => md5('12345678'),
  'status' => 1
);

// Instancia um objeto da classe UserController e envia os dados do usuário para o controller realizar as validações e salvar no banco de dados
$createUser = (new \App\Controller\UserController())->store($data);
var_dump($createUser);

// Retorno da criação
$resultado = ($createUser) ? 'Criação de usuário realizada.' : 'Criação de usuário falhou.';
var_dump($resultado);

// --- Fim do Teste unitário para criação de um usuário --

/**
*  Teste unitário para atualização de um usuário existente
*  @param int $id - ID do usuário a ser atualizado
*  @param array $data - Dados do usuário a serem atualizados
*  @return boolean - Verdadeiro se a atualização tiver sido realizada, falso caso a atualização tiver falhado
*/

// Valores que vão ser atualizados
$data = array(
  'username' => 'emanoeld',
  'email' => 'emanoel.silva@ba.estudante.senai.br',
  'password' => md5('12345678'),
  'status' => 1
);

// Instancia um objeto da classe UserController e envia os dados do usuário para o controller realizar as validações e salvar no banco de dados
$updateUser = (new \App\Controller\UserController())->update(2, $data);
var_dump($updateUser);

// Retorno da atualização
$resultado = ($updateUser) ? 'Atualização de usuário realizada.' : 'Atualização de usuário falhou.';
var_dump($resultado);

/**
*  Teste unitário para exclusão de um usuário
* @param int $id - ID do usuário a ser removido
*  @return boolean - Verdadeiro se a exclusão tiver sido realizada, falso caso a exclusão tiver falhado
*/

// ID do usuário a ser removido
$idUser = 29;

// Instancia um objeto da classe UserController e envia os dados do usuário para o controller realizar as validações e salvar no banco de dados
$deleteUser = (new \App\Controller\UserController())->delete($idUser);
var_dump($deleteUser);

// Retorno da criação
$resultado = ($deleteUser) ? 'Usuário deletado.' : 'Não foi possível deletar o usuário.';
var_dump($resultado);