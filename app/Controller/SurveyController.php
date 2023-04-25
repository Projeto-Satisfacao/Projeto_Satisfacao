<?php

namespace App\Controller;

/**
 * Classe responsável pelo controle das avaliações
 */

//require_once("../../core/Log.php");

use Exception;

class SurveyController
{
    /**
    * Lista todas as avaliações
    * @return array - Array com as informações de todas as avaliações cadastradas no sistema
    */
    public function surveys()
    {
        // Código do método
        // Implementa o método getAll() da Classe SurveyModel para obter todas as avaliações cadastradas no sistema
        return (new \App\Model\SurveyModel())->getAll();
    }

    /**
    * Cria um formulário para uma nova avaliação
    * @return void
    */
    public function create($idDepartment)
    {
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
    public function store($surveyData)
    {
        // Código do método
        try {
            // Verifica se todos os campos obrigatórios foram preenchidos
            if (empty($surveyData['idDepartment']) || empty($surveyData['score']) || empty($surveyData['reason']) || empty($surveyData['comment'])) {
                throw new Exception('Por favor, preencha todos os campos obrigatórios.');
            } else {
                $surveyModel = ((new \App\Model\SurveyModel())->createResult($surveyData['idDepartment'], $surveyData['score'], $surveyData['reason'], $surveyData['comment']));
                if (is_integer($surveyModel)) {
                    return true;
                } else {
                    throw new \Exception("[ATENÇÃO] Ocorreu um erro ao tentar criar .");
                }
            }
        }
        // Exibir mensagem de erro para o usuário
        catch (Exception $e) {
            return ($e->getMessage());
        }
    }


    /**
    * Exibe as informações de uma avaliação
    * @param int $idSurvey - ID da avaliação a ser exibida
    * @return array - Array com as informações da avaliação
    */
    public function show($idSurvey)
    {
        // Código do método
        // Instancia um objeto da classe SurveyModel e busca a avaliação com o ID informado
        $data = (new \App\Model\SurveyModel())->getById($idSurvey);

        try {
            // Verifica se a avaliação existe, se a avaliação não existir, exibe uma mensagem de erro
            return $data ? $data : throw new Exception('Avaliação não encontrada.');
        } catch (Exception $e) {
            // Exibir mensagem de erro para o usuário
            return '[ATENÇÃO] ERRO DE EXIBIÇÃO' . $e->getMessage();
        }
    }

    public function selectSurveysByDepartment($idDepartment)
    {
        $data = (new \App\Model\SurveyModel())->getByDepartment($idDepartment);

        die(json_encode($data));

        try {
            // Verifica se o setor existe, se o setor não existir, exibe uma mensagem de erro
            return $data ? die(json_encode($data)) : die(json_encode('Setor não encontrado.'));
        } catch (Exception $e) {
            // Exibir mensagem de erro para o usuário
            die(json_encode('[ATENÇÃO] ERROR DE EXIBIÇÃO ' . $e->getMessage()));
        }
    }

    /**
    * Cria um formulário para edição de uma avaliação
    * @param int $idSurvey - ID da avaliação a ser editada
    * @return void
    */
    public function edit($idSurvey, $idUser)
    {
        // Metódo removido por questões de segurança e confiabilidade das informações das avaliações
    }

    /**
    * Processa os dados de atualização de uma avaliação
    * @param int $idSurvey - ID da avaliação a ser atualizada
    * @param array $data - Array com os dados atualizados da avaliação
    * @return int - ID da avaliação atualizada
    */
    public function update()
    {
        // Metódo removido por questões de segurança e confiabilidade das informações das avaliações
    }

    /**
    * Remove uma avaliação existente
    * @param int $idSurvey - ID da avaliação a ser removida
    * @return void
    */
    public function delete($idSurvey)
    {
        // Código do método
        try {
            // Verifica se o usuário é administrador, se não for, exibe uma mensagem de erro
            if ($_SESSION['admin']) {
                // Instancia um objeto da classe SurveyModel e remove a avaliação com o ID especificado
                $deleteSurvey = (new \App\Model\SurveyModel())->deleteResult($idSurvey);

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