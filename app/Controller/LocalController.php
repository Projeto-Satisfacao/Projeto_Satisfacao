<?php

namespace App\Controller;

/**
 * Classe responsável pelo controle dos locais
 */

//require_once("../../core/Log.php");

use Exception;

class LocalController {

  /**
  * Lista todos os locais existentes
  * @return array - Array com todos os locais cadastrados no sistema
  */
  public function locations()
  {
    // Código do método
    // Implementa o método getAll() da Classe LocalModel para obter todos os locais cadastrados no sistema
    return (new \App\Model\LocalModel())->getAll();
  }

  /**
  * Cria um formulário para criação de um novo local
  */
  public function create()
  {
    // Código do método
    // Redireciona para a página do formulário de criação de local
    header("Location: App/View/LocalFormView.php");
    exit;
  }

  /**
  * Processa os dados de criação do local
  * @param array $data - Array com os dados do novo local
  * @return int - ID do novo local
  */
  public function store($data) {
    // Código do método
    try {
      //Verifica se todos os campos obrigatórios foram preenchidos
      if (empty($data['local']) || empty($data['address']) || empty($data['url']))  {
        throw new \Exception('Por favor, preencha todos os campos obrigatórios.');
      } else {
        if (($data['local']) && ($data['address']) && ($data['url'])) {
          $createlocal = ((new \App\Model\LocalModel()))->createLocal($data['local'], $data['address'], $data['url']);        
          if (is_integer($createlocal)) {      
            return $createlocal;
          } else{
            throw new \Exception("[ATENÇÃO] Ocorreu um erro ao criar o local.");
          }
        }
      }
    } catch (Exception $e) {
        // Exibir mensagem de erro para o usuário
        return $e->getMessage();
    }
  }

  /**
  * Exibe as informações de um local
  * @param int $idLocal - ID do local a ser exibido
  */
  public function show($idLocal)
  {
    // Código do método
    // Instancia um objeto da classe LocalModel e busca o local com o ID informado
    $data = (new \App\Model\LocalModel())->getById($idLocal);

    try {
      // Verifica se o local existe, se o local não existir, exibe uma mensagem de erro
      return $data ? $data : throw new Exception('Setor não encontrado.');
    } catch (Exception $e) {
        // Exibir mensagem de erro para o usuário
        return '[ATENÇÃO] ERROR DE EXIBIÇÃO' . $e->getMessage();
    }
  }

  /**
  * Cria um formulário para edição de um local
  * @param int $idLocal - ID do local a ser editado
  */
  public function edit($idLocal)
  {
    // Código do método
    // Redireciona para a página do formulário de criação de local com o ID do local a ser editado
    header("Location: /LocalFormView.php?idLocal={$idLocal}");
    exit;
  }

  /**
  * Processa os dados de atualização de um local
  * @param int $idLocal - ID do local a ser atualizado
  */
  public function update($idLocal, $data) {
    // Código do método
    try {
      // Verifica se todos os campos obrigatórios foram preenchidos
      if (empty($data['local']) || empty($data['address']) || empty($data['url'])) {
        throw new Exception('Por favor, preencha todos os campos obrigatórios.');
      }
    } catch (Exception $e) {
        // Exibir mensagem de erro para o usuário
        return '[ATENÇÃO] OCORREU UM ERRO AO TENTAR ATUALIZAR' . $e->getMessage();
    }
    // Instancia um objeto da classe LocalModel e salva os dados do local no banco de dados 
    if (($data['local']) && ($data['address']) && ($data['url'])) {
      $updateLocal = (new \App\Model\LocalModel())->updateLocal($idLocal, $data['local'], $data['address'], $data['url']);
      // Criação do local bem sucedida
      if (is_integer($updateLocal)) {      
        return $updateLocal;
      } else{
         return ("[ATENÇÃO] Ocorreu um erro ao tentar atualizar.");
      }

      // Registra a LOG de atualização do local
      $message = 'Atualizou as informações de um local \n [LOCAL ATUALIZADO]: {$local}';
      \App\Core\Logger::logLocal($message);
    } else {
      // Criação do local falhou
      return false;
    }
  }

  /**
  * Remove um local existente
  * @param int $idLocal - ID do local a ser removido
  */
  public function delete($idLocal)
  {
    // Código do método
    // Instancia um objeto da classe LocalModel e remove o local com o ID especificado
    $deleteLocal = (new \App\Model\LocalModel())->deleteLocal($idLocal);
    //exit(var_dump($deleteLocal));
    if (empty($deleteLocal)) {      
      return $deleteLocal;
    } else{
       return ("[ATENÇÃO] Ocorreu um erro ao tentar deletar local.");
    }

    // Registra a LOG de exclusão do local
    $message = 'Deletou um local \n [ID DELETADO]: {$idLocal}';
    \App\Core\Logger::logUser($message);

    // Redireciona para a página de listagem de locais
    header("Location: /LocalListView.php");
    exit;
  }
}