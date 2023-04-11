<?php

namespace App\Model;

/**
* Classe responsável pelos dados dos setores
*/

require_once("./core/Database.php");

class DepartmentModel extends LocalModel {

  private $idDepartment;
  private $department;
  private $description;
  private $localName;

  /**
  *  Metódo construtor
  *  @param int $idLocal - ID do Local
  *  @return void
  */
  public function getLocalName($idLocal) {
    // Método para definir o nome do Local
    $localData = (new \App\Model\LocalModel())->getById($idLocal);
    $localName = $localData[0]['local'];
  }

  /**
  *  Insere um novo setor
  *  @param string $department - Nome do setor
  *  @param string $description - Descrição do setor
  *  @return int - ID do setor inserido
  */
  public function createDepartment($department, $description, $idLocal) {
    // Código do método
    $conexao = \App\Model\Database::conectar();

    // Prepara o comando SQL e vincula os parâmetros
    $createDepartment = $conexao->prepare("INSERT INTO department (department, description, local_idlocal) VALUES (?, ?, ?)");
    $createDepartment->bind_param("ssi", $department, $description, $idLocal);

    // Executa o comando SQL e retorna o ID do departamento inserido
    if ($createDepartment->execute()) {
        return true;
    } else {
        throw new Exception("Erro ao criar departamento: " . $conexao->error);
        return false;
    }
  }

  /**
  *  Atualiza um setor existente
  *  @param int $idDepartment - ID do setor a ser atualizado
  *  @param string $department - Novo nome do setor
  *  @param string $description - Nova descrição do setor
  *  @return void
  */
  public function updateDepartment($idDepartment, $department, $description) {
    // Código do método
    $conexao = \App\Model\Database::conectar();

    // Prepara o comando SQL e vincula os parâmetros
    $updateDepartment = $conexao->prepare("UPDATE department SET department = ?, description = ? WHERE iddepartment = ?");
    $updateDepartment->bind_param("ssi", $department, $description, $idDepartment);

    // Executa o comando SQL e verifica se houve algum erro
    if ($updateDepartment->execute()) {
        return true;
    } else {
        throw new Exception("Erro ao atualizar departamento: " . $conexao->error);
        return false;
    }
  }

  /**
  *   Deleta um setor existente
  *  @param int $idDepartment - ID do setor a ser deletado
  *  @return void
  */
  public function deleteDepartment($idDepartment) {
    // Código do método
    $conexao = \App\Model\Database::conectar();

    // Prepara o comando SQL e vincula os parâmetros
    $deleteDepartment = $conexao->prepare("DELETE FROM department WHERE iddepartment = ?");
    $deleteDepartment->bind_param("i", $idDepartment);

    // Executa o comando SQL e verifica se houve algum erro
    if ($deleteDepartment->execute()) {
        return true;
    } else {
        throw new Exception("Erro ao deletar departamento: " . $conexao->error);
        return false;
    }
  }

  /**
  *  Filtra os setores pelo nome
  *  @param string $department - Nome do setor a ser filtrado
  *  @return array - Array contendo os setores encontrados
  */
  public function getByName($department) {
    // Código do método
    $conexao = \App\Model\Database::conectar();

    // Prepara o comando SQL e vincula os parâmetros
    $getByName = $conexao->prepare("SELECT * FROM department WHERE department LIKE ?");
    $getByName->bind_param("s", $department);

    // Executa a consulta SQL e retorna os resultados em um array associativo
    $getByName->execute();
    $result = $getByName->get_result();
    $departments = array();
    while ($row = $result->fetch_assoc()) {
      $departments[] = $row;
    }
    return $departments;
  }

  /**
  *  Filtra os setores pelo ID
  *  @param int $idDepartment - ID do setor a ser filtrado
  *  @return array - Array contendo o setor encontrado
  */
  public function getById($idDepartment) {
    // Código do método
    $conexao = \App\Model\Database::conectar();

    // Prepara o comando SQL e vincula os parâmetros
    $getById = $conexao->prepare("SELECT * FROM department WHERE iddepartment = ?");
    $getById->bind_param("i", $idDepartment);

    // Executa a consulta SQL e retorna os resultados em um array associativo
    $getById->execute();
    $result = $getById->get_result();
    $departments = array();
    while ($row = $result->fetch_assoc()) {
      $departments[] = $row;
    }
    return $departments;
  }

  /**
  *  Filtra todos os setores cadastrados no sistema
  *  @return array - Array contendo todos os setores cadastrados
  */
  public function getAll() {
    // Código do método
    $conexao = \App\Model\Database::conectar();

    // Prepara o comando SQL e vincula os parâmetros
    $allDepartments = $conexao->prepare("SELECT * FROM department");

    // Executa a consulta SQL e retorna os resultados em um array associativo
    $allDepartments->execute();
    $result = $allDepartments->get_result();
    $departments = array();
    while ($row = $result->fetch_assoc()) {
      $departments[] = $row;
    }
    return $departments;
  }

}