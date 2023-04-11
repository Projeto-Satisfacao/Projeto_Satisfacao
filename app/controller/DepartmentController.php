<?php

namespace App\Controller;

/**
 * Classe responsável pelo controle dos setores
 */

class DepartmentController {

  /**
  * Lista todos os setores existentes
  * @return array - Array com todos os setores cadastrados no sistema
  */
  public function departments() {
    // Código do método
    // Implementa o método getAll() da Classe DepartmentModel para obter todos os setores cadastrados no sistema
    return (new \App\Model\DepartmentModel())->getAll();
  }

  /**
  * Cria um formulário para criação de um novo setor
  */
  public function create() {
    // Código do método
    // Redireciona para a página do formulário de criação de setor
    header('Location: /DepartmentFormView.php');
    exit;
  }

  /**
  * Processa os dados de criação do setor
  * @param array $data - Array com os dados do novo setor
  * @return int - ID do novo setor
  */
  public function store($data) {
    // Código do método
    try {
      // Verifica se todos os campos obrigatórios foram preenchidos
      if (empty($data['department']) || empty($data['description'])) {
        throw new Exception('Por favor, preencha todos os campos obrigatórios.');
      }
    } catch (Exception $e) {
        // Exibir mensagem de erro para o usuário
        echo '[ATENÇÃO] ' . $e->getMessage();
    }

    // Instancia um objeto da classe DepartmentModel e salva os dados do setor no banco de dados
    if (($data['department']) && ($data['description'])) {
      $createDepartment = (new \App\Model\DepartmentModel())->createDepartment($data['department'], $data['description']);
      // Criação do setor bem sucedida
      return true;
    } else {
      // Criação do setor falhou
      return false;
    }
  }

  /**
  * Exibe as informações de um setor
  * @param int $idDepartment - ID do setor a ser exibido
  */
  public function show($idDepartment) {
    // Código do método
    // Instancia um objeto da classe DepartmentModel e busca o setor com o ID informado
    $data = (new \App\Model\DepartmentModel())->getById($idDepartment);

    try {
      // Verifica se o setor existe, se o setor não existir, exibe uma mensagem de erro
      return $data ? $data : throw new Exception('Setor não encontrado.');
    } catch (Exception $e) {
        // Exibir mensagem de erro para o usuário
        echo '[ATENÇÃO] ' . $e->getMessage();
    }
  }

  /**
  * Cria um formulário para edição de um setor
  * @param int $idDepartment - ID do setor a ser editado
  */
  public function edit($idDepartment) {
    // Código do método
    // Redireciona para a página do formulário de criação de setor com o ID do setor a ser editado
    header("Location: /DepartmentFormView.php?idDepartment={$idDepartment}");
    exit;
  }

  /**
  * Processa os dados de atualização de um setor
  * @param int $idDepartment - ID do setor a ser atualizado
  */
  public function update($idDepartment) {
    // Código do método
    try {
      // Verifica se todos os campos obrigatórios foram preenchidos
      if (empty($data['department']) || empty($data['description'])) {
        throw new Exception('Por favor, preencha todos os campos obrigatórios.');
      }
    } catch (Exception $e) {
        // Exibir mensagem de erro para o usuário
        echo '[ATENÇÃO] ' . $e->getMessage();
    }

    // Instancia um objeto da classe DepartmentModel e salva os dados do setor no banco de dados
    if (($data['department']) && ($data['description'])) {
      $editDepartment = (new \App\Model\DepartmentModel())->updateDepartment($idDepartment, $data['department'], $data['description']);
      // Atualização do setor bem sucedida
      return true;
    } else {
      // Atualização do setor falhou
      return false;
    }
  }

  /**
  * Remove um setor existente
  * @param int $idDepartment - ID do setor a ser removido
  */
  public function delete($idDepartment) {
    // Código do método
    // Instancia um objeto da classe DepartmentModel e remove o setor com o ID especificado
    $deleteDepartment = (new \App\Model\DepartmentModel())->deleteDepartment($idDepartment);

    // Redireciona para a página de listagem de setores
    header("Location: /DepartmentListView.php");
    exit;
  }
}
