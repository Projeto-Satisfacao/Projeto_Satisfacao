<?php

/**
 * Testes unitários da estrutura MVC Survey
 */

/**
*  Teste unitário para criação de um survey
*  @param array $data - contendo: idDepartment, score, reason, comment
*  @return boolean - Verdadeiro se a criação tiver sido realizada, falso caso a criação tiver falhado
*/
require_once("autoload.php");
// Valores que vão ser cadastrados
$data = array(
  'idDepartment' => '2',
  'score' => '3',
  'reason' => 'TESTE REASON',
  'comment' =>'TESTE COMMENT',
);

// Instancia um objeto da classe DepartmentController e envia os dados do survey para o controller realizar as validações e salvar no banco de dados
$createSurvey = (new \App\Controller\SurveyController())->store($data);
var_dump($createSurvey);

// Retorno da criação
// $resultado = ($createSurvey) ? 'Criação de survey realizada.' : 'Criação de survey falhou.';
// var_dump($createSurvey);

// --- Fim do Teste unitário para criação de um survey --