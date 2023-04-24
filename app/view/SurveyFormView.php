<?php

/**
 * Classe responsável pelos dados do formulário de criação ou edição de uma avaliação e seus detalhes
 */
  namespace App\View;
  
  require_once "autoload.php";
  require_once("error.php");

  use Exception;

  class SurveyFormView {

    /**
    * Exibe o formulário para avaliação de um setor
    * @param int $idDepartment - ID do setor a ser avaliado
    * @param array $departmentData - Dados do setor a serem exibidos no formulário
    * @return void
    * 
    * Descrição:
    * Este método exibe o formulário HTML para avaliação de um setor específico.
    * 
    * Entradas:
    * $idDepartment: o ID do setor a ser avaliado.
    * $departmentData: um array contendo os dados do setor a serem exibidos no formulário. Os campos possíveis são:
    * 'name': o nome do setor
    * 'description': a descrição do setor
    * 
    * Saídas:
    * Este método não retorna nenhuma saída.
    * 
    * Requisitos:
    * Este método requer que o formulário HTML para avaliação de um setor seja definido e que os dados do setor a serem exibidos sejam passados como parâmetro.
    */
    public function displaySurveyForm($idDepartment, $departmentData) {
        // Código do método
        /**
       * Esse método deve definir o caminho da página que HTML onde está a página de avaliação de setores.
       * Ele será chamado pelo Menu do sistema e sua única função é exibir a página.
       * A partir da variável $departmentData, deve-se preencher os campos padrão com os valores da variável (Exemplo: A descrição do setor)
       */
    }
    
    /**
    * Envia os dados da avaliação para o controlador
    * @param int $idDepartment - ID do setor avaliado
    * @param array $surveyData - Dados da avaliação informados no formulário
    * @return array - Dados da avaliação
    * 
    * Descrição:
    * Este método é responsável por receber os dados do formulário de avaliação de um setor e encaminhá-los para o controlador.
    * 
    * Entradas:
    * $idDepartment: o ID do setor avaliado.
    * $surveyData: um array contendo os dados da avaliação informados no formulário. Os campos possíveis são:
    * 'comments': os comentários feitos pelo avaliador
    * 'rating': a nota dada pelo avaliador
    * 
    * Saídas:
    * Um array contendo os dados da avaliação, incluindo:
    * 'id_department': o ID do setor avaliado
    * 'comments': os comentários feitos pelo avaliador
    * 'rating': a nota dada pelo avaliador
    * 
    * Requisitos:
    * Este método requer que o formulário HTML para avaliação de um setor seja preenchido corretamente e que o método correspondente
    * do controlador seja implementado para armazenar os dados da avaliação. Exemplo: store($surveyData).
    */
    public function getSurveyFormData($idDepartment, $surveyData) {
        // Código do método
        /**
       * Esse método é o responsável por receber os dados do formulário preenchido e encaminhar para o controller.
       * Dentro dele devem ser feitas as validações do que foi preenchido pelo usuário.
       * Exemplos de validações:
       * - Verificar se todos os campos estão preenchidos;
       * O método do controller que recebe esses dados é o store($surveyData).
       */

      try
      {
        // Verifica se todos os campos obrigatórios foram preenchidos
        if (empty($surveyData)) { 
          die(json_encode('Não foi possivel salvar o score'));
          return null;
        } else {  
          $surveyModel = new \App\Model\SurveyModel();
          $surveyModel->createResult($idDepartment, $surveyData); 
          die(json_encode('Não foi possivel salvar o score'));

        }   
        
      } catch (Exception $e) { 
          // Exibir mensagem de erro para o usuário
          echo '[ATENÇÃO] ' . $e->getMessage();
      }
    
    }
    
  }