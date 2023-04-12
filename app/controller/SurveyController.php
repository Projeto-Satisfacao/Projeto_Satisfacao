<?php

namespace App\Controller;

/**
 * Classe responsável pelo controle das avaliações
 */

require_once("../../core/Log.php");

use Exception;

class SurveyController {

  /**
  * Lista todas as avaliações
  * @return array - Array com as informações de todas as avaliações cadastradas no sistema
  */
  public function surveys() {
    // Código do método
    // Implementa o método getAll() da Classe SurveyModel para obter todas as avaliações cadastradas no sistema
    return (new \App\Model\SurveyModel())->getAll();
  }

  /**
  * Cria um formulário para uma nova avaliação
  * @return void
  */
  public function create($idDepartment) {
    // Código do método
    // Redireciona para a página do formulário de resposta da pesquisa
    header("Location: /SurveyFormView.php?idDepartment={$idDepartment}");
    exit;
  }

  /**
  * Processa os dados de uma nova avaliação
  * @param array $data - Array com os dados da nova avaliação
  * @return int - ID da nova avaliação inserida
  */
  public function store($data) {
    // Código do método
    try {
      // Verifica se todos os campos obrigatórios foram preenchidos
      if (empty($data['idDepartment']) || empty($data['score']) || empty($data['reason']) || empty($data['comment'])) {
        throw new Exception('Por favor, preencha todos os campos obrigatórios.');
      }
    } catch (Exception $e) {
        // Exibir mensagem de erro para o usuário
        echo '[ATENÇÃO] ' . $e->getMessage();
    }

    // Instancia um objeto da classe LocalModel e salva os dados do setor no banco de dados
    if (($data['idDepartment']) && ($data['score']) && ($data['reason']) && ($data['comment'])) {
      $createResult = (new \App\Model\SurveyModel())->createResult($data['idDepartment'], $data['score'], $data['reason'], $data['comment']);
      // Criação do local bem sucedida
      return true;

      $department = $data['idDepartment'];

      // Registra a LOG de criação da avaliação
      $message = 'Cadastrou um novo setor \n [ID SETOR AVALIADO]: {$department}';
      \App\Core\Logger::logSurvey($message);
    } else {
      // Criação do local falhou
      return false;
    }
  }

  /**
  * Exibe as informações de uma avaliação
  * @param int $idSurvey - ID da avaliação a ser exibida
  * @return array - Array com as informações da avaliação
  */
  public function show($idSurvey) {
    // Código do método
    // Instancia um objeto da classe SurveyModel e busca a avaliação com o ID informado
    $data = (new \App\Model\SurveyModel())->getById($idSurvey);

    try {
      // Verifica se a avaliação existe, se a avaliação não existir, exibe uma mensagem de erro
      return $data ? $data : throw new Exception('Avaliação não encontrada.');
    } catch (Exception $e) {
        // Exibir mensagem de erro para o usuário
        echo '[ATENÇÃO] ' . $e->getMessage();
    }
  }

  /**
  * Cria um formulário para edição de uma avaliação
  * @param int $idSurvey - ID da avaliação a ser editada
  * @return void
  */
  public function edit($idSurvey, $idUser) {
    // Metódo removido por questões de segurança e confiabilidade das informações das avaliações
  }

  /**
  * Processa os dados de atualização de uma avaliação
  * @param int $idSurvey - ID da avaliação a ser atualizada
  * @param array $data - Array com os dados atualizados da avaliação
  * @return int - ID da avaliação atualizada
  */
  public function update() {
    // Metódo removido por questões de segurança e confiabilidade das informações das avaliações
  }

  /**
  * Remove uma avaliação existente
  * @param int $idSurvey - ID da avaliação a ser removida
  * @return void
  */
  public function delete($idSurvey) {
    // Código do método
    try {
      // Verifica se o usuário é administrador, se não for, exibe uma mensagem de erro
      if ($_SESSION['admin']) {
        // Instancia um objeto da classe SurveyModel e remove a avaliação com o ID especificado
        $deleteSurvey = (new \App\Model\SurveyModel())->deleteSurvey($idSurvey);

        // Registra a LOG de exclusão de avaliação
        $message = 'Deletou uma avaliação \n [ID DELETADO]: {$idSurvey}';
        \App\Core\Logger::logSurvey($idSurvey);

        // Redireciona para a página de listagem de locais
        header("Location: /SurveyListView.php");
        exit;
      } else {
        throw new Exception('Você não tem permissão para deletar avaliações.');
      }
    } catch (Exception $e) {
      // Exibir mensagem de erro para o usuário
      echo '[ATENÇÃO] ' . $e->getMessage();
    }
  }
}
