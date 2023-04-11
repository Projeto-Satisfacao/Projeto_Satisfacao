<?php

namespace App\Model;

/**
* Classe responsável pelos dados dos locais
*/

require_once("./core/Database.php");

class LocalModel {

  private $idLocal;
  private $local;
  private $address;
  private $url;

  /**
  *  Insere um novo local
  *  @param string $local - Nome do local
  *  @param string $address - Endereço
  *  @param string $url - URL
  *  @return int - ID do local inserido
  */
  public function createLocal($local, $address, $url) {
    // Código do método
    $conexao = \App\Model\Database::conectar();

    // Prepara o comando SQL e vincula os parâmetros
    $createLocal = $conexao->prepare("INSERT INTO local (local, address, url) VALUES (?, ?, ?)");
    $createLocal->bind_param("sss", $local, $address, $url);

    // Executa o comando SQL e retorna o ID do local inserido
    if ($createLocal->execute()) {
        return true;
    } else {
        throw new Exception("Erro ao criar local: " . $conexao->error);
        return false;
    }
  }

  /**
  *  Atualiza um local
  *  @param int $idLocal - ID do local a ser atualizado
  *  @param string $local - Nome do local
  *  @param string $address - Endereço
  *  @param string $url - URL
  *  @return boolean - True se atualizado com sucesso, false caso contrário
  */
  public function updateLocal($idLocal, $local, $address, $url) {
    // Código do método
    $conexao = \App\Model\Database::conectar();

    // Prepara o comando SQL e vincula os parâmetros
    $updateLocal = $conexao->prepare("UPDATE local SET local = ?, address = ?, description = ? WHERE idlocal = ?");
    $updateLocal->bind_param("sssi", $local, $address, $description, $idLocal);

    // Executa o comando SQL e verifica se houve algum erro
    if ($updateLocal->execute()) {
        return true;
    } else {
        throw new Exception("Erro ao atualizar local: " . $conexao->error);
        return false;
    }
  }

  /**
  *  Deleta um local
  *  @param int $idLocal - ID do local a ser deletado
  *  @return boolean - True se deletado com sucesso, false caso contrário
  */
  public function deleteLocal($idLocal) {
    // Código do método
    $conexao = \App\Model\Database::conectar();

    // Prepara o comando SQL e vincula os parâmetros
    $deleteLocal = $conexao->prepare("DELETE FROM local WHERE idlocal = ?");
    $deleteLocal->bind_param("i", $idLocal);

    // Executa o comando SQL e verifica se houve algum erro
    if ($deleteLocal->execute()) {
        return true;
    } else {
        throw new Exception("Erro ao deletar local: " . $conexao->error);
        return false;
    }
  }

  /**
  *  Filtra os locais pelo nome
  *  @param string $local - Nome do local a ser filtrado
  *  @return array - Array com os locais encontrados
  */
  public function getByName($local) {
    // Código do método
    $conexao = \App\Model\Database::conectar();

    // Prepara o comando SQL e vincula os parâmetros
    $getByName = $conexao->prepare("SELECT * FROM local WHERE local LIKE ?");
    $getByName->bind_param("s", $local);

    // Executa a consulta SQL e retorna os resultados em um array associativo
    $getByName->execute();
    $result = $getByName->get_result();
    $locais = array();
    while ($row = $result->fetch_assoc()) {
      $locais[] = $row;
    }
    return $locais;
  }

  /**
  *  Filtra os locais pelo ID
  *  @param int $idLocal - ID do local a ser filtrado
  *  @return array - Array com o local encontrado
  */
  public function getById($idLocal) {
    // Código do método
    $conexao = \App\Model\Database::conectar();

    // Prepara o comando SQL e vincula os parâmetros
    $getById = $conexao->prepare("SELECT * FROM local WHERE idlocal = ?");
    $getById->bind_param("i", $idLocal);

    // Executa a consulta SQL e retorna os resultados em um array associativo
    $getById->execute();
    $result = $getById->get_result();
    $locals = array();
    while ($row = $result->fetch_assoc()) {
      $locals[] = $row;
    }
    return $locals;
  }

  /**
  *  Filtra todos os locais
  *  @return array - Array com todos os locais cadastrados no sistema
  */
  public function getAll() {
    // Código do método
    $conexao = \App\Model\Database::conectar();

    // Prepara o comando SQL e vincula os parâmetros
    $allLocals = $conexao->prepare("SELECT * FROM local");

    // Executa a consulta SQL e retorna os resultados em um array associativo
    $allLocals->execute();
    $result = $allLocals->get_result();
    $locals = array();
    while ($row = $result->fetch_assoc()) {
      $locals[] = $row;
    }
    return $locals;
  } 

}