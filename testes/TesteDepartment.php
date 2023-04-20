<?php

/**
 * Testes unitários da estrutura MVC Survey
 */

/**
*  Teste unitário para criação de um departamento
*  @param array $data - contendo: department, description, idLocal
*  @return boolean - Verdadeiro se a criação tiver sido realizada, falso caso a criação tiver falhado
*/
require_once("autoload.php");
// Valores que vão ser cadastrados
$data = array(
  'department' => 'TESTE UNITÁRIO',
  'description' => 'TESTE DESCRIÇÃO',
  'idLocal' => '16',
);

// Instancia um objeto da classe DepartmentController e envia os dados do departamento para o controller realizar as validações e salvar no banco de dados
$createDepartment = (new \App\Controller\DepartmentController())->store($data);
var_dump($createDepartment);

// Retorno da criação
// $resultado = ($createDepartment) ? 'Criação de departamento realizada.' : 'Criação de usuário falhou.';
// var_dump($createDepartment);

// --- Fim do Teste unitário para criação de um departamento --

/**
*  Teste unitário para update de um departamento
*  @param array $data - contendo: department, description, idLocal
*  @return boolean - Verdadeiro se a criação tiver sido realizada, falso caso a criação tiver falhado
*/
require_once("autoload.php");
// Valores que vão da update
$iddepartment = 1;
$data = array(
  'department' => 'TESTE DE UPDATE',
  'description' => 'TESTE DE UPDATE DESCRIÇÃO',
);

// Instancia um objeto da classe DepartmentController e envia os dados do departamento para o controller realizar as validações e salvar no banco de dados
$updateDepartment = (new \App\Controller\DepartmentController())->update($iddepartment, $data);
var_dump($updateDepartment);

// Retorno da criação
// $resultado = ($updateDepartment) ? 'Criação de departamento realizada.' : 'Criação de departamento falhou.';
// var_dump($updateDepartment);

// --- Fim do Teste unitário para update de um departamento --

/**
*  Teste unitário para update de um departamento
*  @param array $iddepartment - id do departamento
*  @return boolean - Verdadeiro se a criação tiver sido realizada, falso caso a criação tiver falhado
*/
require_once("autoload.php");
// Valores que vão da update
$iddepartment = 1;

// Instancia um objeto da classe DepartmentController e envia os dados do departamento para o controller realizar as validações e salvar no banco de dados
$updateDepartment = (new \App\Controller\DepartmentController())->delete($iddepartment);
var_dump($updateDepartment);

// Retorno da criação
// $resultado = ($updateDepartment) ? 'Criação de departamento realizada.' : 'Criação de departamento falhou.';
// var_dump($updateDepartment);

// --- Fim do Teste unitário para update de um departamento --

