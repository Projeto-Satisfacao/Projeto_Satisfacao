<?php

namespace App\Model;

/**
* Classe responsável pelos dados dos locais
*/

try {
  require_once("../core/Database.php");
} catch (\Throwable $th) {
  require_once("core/Database.php");
}


use Exception;
use mysqli_sql_exception;

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
    
    if(get_class($conexao) == "mysqli"){
     // Prepara o comando SQL e vincula os parâmetros
     $createLocal = $conexao->prepare("INSERT INTO local (local, address, url) VALUES (?, ?, ?)");
     $createLocal->bind_param("sss", $local, $address, $url);
    
      try {
        // Executa o comando SQL e retorna o ID do local inserido
        $createLocal->execute();
        // Capturar id cadastrado              
        $result = \mysqli_insert_id($conexao);   
        return $result;
      } catch (\mysqli_sql_exception $e) {  
        // Verifica se o erro é "Duplicate entry"
        if ($e->getCode() == 1062) {
          // Trata o erro (exibindo uma mensagem de erro para o local)     
          return ($e->getCode());
        } else {
          // Trata outros erros de banco de dados (exibindo uma mensagem de erro genérica para o local)
          return ($e->getCode());
        }
      }
    } else{     
      //retorna a conexao como erro de conexao 
      return $conexao;
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
    
    if(get_class($conexao) == "mysqli") {
    // Prepara o comando SQL e vincula os parâmetros
      $updateLocal = $conexao->prepare("UPDATE local SET local = ?, address = ?, url = ? WHERE idlocal = ?");
      $updateLocal->bind_param("sssi", $local, $address, $url, $idLocal);
      // Executa o comando SQL e verifica se houve algum erro
      try {
        // Executa o comando SQL e retorna o ID do local inserido   
        $updateLocal->execute();
       // Capturar id cadastrado                
        $result = mysqli_insert_id($conexao);
        return $result;

      } catch (\mysqli_sql_exception $e) {
        // Verifica se o erro é "Duplicate entry"
        return $e;
       if ($e->getCode() == 1062) {
        // Trata o erro (exibindo uma mensagem de erro para o local)
          return ($e->getCode());
       } else {
          // Trata outros erros de banco de dados (exibindo uma mensagem de erro genérica para o local)
          return ( $e->getMessage());
        }
      }
    } else {
      // Trata outros erros de banco de dados (exibindo uma mensagem de erro genérica para o local)
      return $conexao;
    }
  }

  /**
  *  Deleta um local
  *  @param int $idLocal - ID do local a ser deletado
  *  @return boolean - True se deletado com sucesso, false caso contrário
  */
  public function deleteLocal($idLocal) 
  {
    // Código do método
    $conexao = \App\Model\Database::conectar();
    if (get_class($conexao) == "mysqli") {

    // Prepara o comando SQL e vincula os parâmetros
     $deleteLocal = $conexao->prepare("DELETE FROM local WHERE idlocal = ?");
     $deleteLocal->bind_param("i", $idLocal);
    // Executa o comando SQL e verifica se houve algum erro
      try {
        $deleteLocal->execute();
        return true;
      } catch (\mysqli_sql_exception $e) {
        
          // Trata outros erros de banco de dados (exibindo uma mensagem de erro genérica para o local)
          return($e->getMessage());
        
      }
   } else {
      //retorna a conexao como erro de conexao 
      return $conexao;
   }
  } 

  /**
  *  Filtra os locais pelo nome
  *  @param string $local - Nome do local a ser filtrado
  *  @return array - Array com os locais encontrados
  */
  public function getByName($local) 
  {
    // Código do método
    $conexao = \App\Model\Database::conectar();
    if (get_class($conexao) == "mysqli") {
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
   } else {
      //retorna a conexao como erro de conexao 
      return $conexao;
   }
  }

  /**
  *  Filtra os locais pelo ID
  *  @param int $idLocal - ID do local a ser filtrado
  *  @return array - Array com o local encontrado
  */
  public function getById($idLocal) 
  {
    // Código do método
    $conexao = \App\Model\Database::conectar();
    if (get_class($conexao) == "mysqli") {
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
   } else {     
    //retorna a conexao como erro de conexao 
    return $conexao;
  }
  }

  /**
  *  Filtra todos os locais
  *  @return array - Array com todos os locais cadastrados no sistema
  */
  public function getAll() 
  {
    // Código do método
    $conexao = \App\Model\Database::conectar();
    if (get_class($conexao) == "mysqli") {
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
    } else {     
      //retorna a conexao como erro de conexao 
      return $conexao;
    }
  } 

}