<?php

/**
 * Testes unitários da estrutura MVC Local
 */
/**
* Esse Tipo de Teste não será aceito
*/


// Informações de login
$local = 1;
$address = "endereç Senai mudado";
$url = "mudoucom.br";
$idlocal = 1;


$create = new \App\Model\LocalModel;

$create->updateLocal($idlocal, $local, $address, $url);

// --- Fim do Teste  --

/**
*  Teste unitário para criação de local com o store
*  @param string $username - Nome de usuário
*  @param string $email - Email
*  @param string $password - Senha
*  @param int $status - Status de administrador (0 = usuário comum, 1 = administrador)
*  @return boolean - Verdadeiro se a criação tiver sido realizada, falso caso a criação tiver falhado
*/
//Autoload
require_once("autoload.php");
// Valores que vão ser cadastrados
$data = array(
    'local' => 'SENAI-CAMAÇARI',
    'address' => 'endereço do Senai-Camçari',
    'url' => 'senaicamaçari.com.br',
  );
  
  // Instancia um objeto da classe LocalController e envia os dados do local para o controller realizar as validações e salvar no banco de dados
  $createUser = (new \App\Controller\LocalController())->store($data);
  var_dump($createUser);
  
  // Retorno da criação
  //$resultado = ($createUser) ? 'Criação de usuário realizada.' : 'Criação de usuário falhou.';
  //var_dump($resultado);
  
  // --- Fim do Teste unitário para criação de um usuário --

/**
*  Teste unitário para deletar um local 
*  @param int $idlocal - Id do local
*  @return boolean - Verdadeiro se a criação tiver sido realizada, falso caso a criação tiver falhado
*/
//Autoload
require_once("autoload.php");

//Parametros
$idlocal = 1;

// Instancia um objeto da classe LocalController e envia os dados do local para o controller realizar as validações e salvar no banco de dados
  $deleteLocal = (new \App\Controller\LocalController())->delete($idlocal);
  var_dump($deleteLocal);
  
  // Retorno da criação
  //$resultado = ($createUser) ? 'Criação de usuário realizada.' : 'Criação de usuário falhou.';
  //var_dump($resultado);
  
// --- Fim do Teste unitário para deletar um local --