<?php

namespace App\Model;

/**
* Classe responsável pelos dados dos usuários
*/
//Produção
//require_once("../../core/Database.php");

//Para teste do index.php
require_once("core/Database.php");

use Exception;

class UserModel {

  private $idUser;
  private $username;
  private $email;
  private $password;
  private $status;

  /**
  * Insere um usuário novo
  *  @param string $username - Nome de usuário
  *  @param string $email - Email
  *  @param string $password - Senha
  *  @param int $status - Status de administrador (0 = usuário comum, 1 = administrador)  
  *  @todo text: Implementar traits para mapear as possibilidades de errors conforme estrutura de banco
  */
  public function createUser($username, $email, $password, $status) {
    // Código do método   
    var_dump('aq2');
    $conexao = \App\Model\Database::conectar();
        
    if(get_class($conexao) == "mysqli"){
      // Prepara o comando SQL e vincula os parâmetros
      $createUser = $conexao->prepare("INSERT INTO user (username, email, password, status) VALUES (?,?,?,?)");           
      $createUser->bind_param("sssd", $username, $email, $password, $status);
      
      try {
        // Executa o comando SQL e retorna o ID do usuário inserido        
        $createUser->execute();
        // Capturar id cadastrado                
        $result = mysqli_insert_id($conexao);        
        return ($result);
      } catch (\mysqli_sql_exception $e) {
        
        // Verifica se o erro é "Duplicate entry"
        return $e;
        if ($e->getCode() == 1062) {
          // Trata o erro (exibindo uma mensagem de erro para o usuário)
          //exit(var_dump($e->getCode().": [ATENÇÃO] O nome de usuário já está em uso. Por favor, escolha outro nome."));          
          return ($e->getCode());
        } else {
          // Trata outros erros de banco de dados (exibindo uma mensagem de erro genérica para o usuário)
          return ($e->getCode());
        }              
      }
    }else{     
      //retorna a conexao como erro de conexao 
      return $conexao;
    }

    
  }

  /**
  *  Atualiza um usuário
  *  @param int $idUser - ID do usuário a ser atualizado
  *  @param string $username - Nome de usuário
  *  @param string $email - Email
  *  @param string $password - Senha
  *  @param int $status - Status de administrador (0 = usuário comum, 1 = administrador)
  */
  public function updateUser($idUser, $username, $email, $password, $status) {
    // Código do método
    $conexao = \App\Model\Database::conectar();

    if(get_class($conexao) == "mysqli"){
    // Prepara o comando SQL e vincula os parâmetros
      $updateUser = $conexao->prepare("UPDATE user SET username = ?, email = ?, password = ?, status = ? WHERE iduser = ?");
      $updateUser->bind_param("sssdi", $username, $email, $password, $status, $idUser);

      // Executa o comando SQL e verifica se houve algum erro
      try {
        // Executa o comando SQL e retorna o ID do usuário inserido        
        $updateUser->execute();
        // Capturar id cadastrado                
        $result = mysqli_insert_id($conexao);        
        return ($result);
      } catch (\mysqli_sql_exception $e) {
        // Verifica se o erro é "Duplicate entry"
        return $e;
        if ($e->getCode() == 1062) {
          // Trata o erro (exibindo uma mensagem de erro para o usuário)
          return ($e->getCode());
        } else {
          // Trata outros erros de banco de dados (exibindo uma mensagem de erro genérica para o usuário)
          return ($e->getCode());
        }      
      }
    }else{     
      //retorna a conexao como erro de conexao 
      return $conexao;
    }
  }

  /**
  * Deleta um usuário
  *  @param int $idUser - ID do usuário a ser deletado
  */
  public function deleteUser($idUser) {
    // Código do método
    $conexao = \App\Model\Database::conectar();

    if(get_class($conexao) == "mysqli"){
    // Prepara o comando SQL e vincula os parâmetros
    $deleteUser = $conexao->prepare("DELETE FROM user WHERE iduser = ?");
    $deleteUser->bind_param("i", $idUser);
    try {

      $deleteUser->execute();
    } catch (\mysqli_sql_exception $e) {
      // Verifica se o erro é "Duplicate entry"
      return $e;
      if ($e->getCode() == 1062) {
        // Trata o erro (exibindo uma mensagem de erro para o usuário)
        return ($e->getCode());
      } else {
        // Trata outros erros de banco de dados (exibindo uma mensagem de erro genérica para o usuário)
        return ($e->getCode());
      }      
    }
    }else{     
      //retorna a conexao como erro de conexao 
      return $conexao;
    }
  }

  /**
  * Filtra os usuários pelo nome de usuário
  *  @param string $username - Nome de usuário
  *  @return array - Array com os usuários filtrados
  */
  public function getByUsername($username) {
    // Código do método
    $conexao = \App\Model\Database::conectar();

    // Prepara o comando SQL e vincula os parâmetros
    $byUsername = $conexao->prepare("SELECT * FROM user WHERE username LIKE ?");
    $byUsername->bind_param("s", "%$username%");

    // Executa a consulta SQL e retorna os resultados em um array associativo
    $byUsername->execute();
    $result = $byUsername->get_result();
    $users = array();
    while ($row = $result->fetch_assoc()) {
      $users[] = $row;
    }
    return $users;
  }

  /**
  * Filtra os usuários pelo ID
  *  @param int $idUser - ID do usuário
  *  @return array - Array com os usuários filtrados
  */
  public function getById($idUser) {
    // Código do método
    $conexao = \App\Model\Database::conectar();
    if (get_class($conexao) == "mysqli") {
    // Prepara o comando SQL e vincula os parâmetros
    $byId = $conexao->prepare("SELECT * FROM user WHERE iduser = ?");
    $byId->bind_param("i", $idUser);

    // Executa a consulta SQL e retorna os resultados em um array associativo
    $byId->execute();
    $result = $byId->get_result();
    $users = array();
    while ($row = $result->fetch_assoc()) {
      $users[] = $row;
    }
    return $users;
   } else {
    //retorna a conexao como erro de conexao 
    return $conexao;
   }
  }

  /**
  * Filtra os usuários pelo email
  *  @param string $email - Email
  *  @return array - Array com os usuários filtrados
  */
  public function getByEmail($email) {
    // Código do método
    $conexao = \App\Model\Database::conectar();
    if (get_class($conexao) == "mysqli") {
    // Prepara o comando SQL e vincula os parâmetros
    $byEmail = $conexao->prepare("SELECT * FROM user WHERE email LIKE ?");
    $byEmail->bind_param("s", $email);

    // Executa a consulta SQL e retorna os resultados em um array associativo
    $byEmail->execute();
    $result = $byEmail->get_result();
    $users = array();
    while ($row = $result->fetch_assoc()) {
      $users[] = $row;
    }
    return $users;
   } else {
      //retorna a conexao como erro de conexao 
      return $conexao;
   }
  }

  /**
  * Filtra todos os usuários
  *  @return array - Array com todos os usuários cadastrados no sistema
  */
  public function getAll() {
    // Código do método
    $conexao = \App\Model\Database::conectar();
    if (get_class($conexao) == "mysqli") {
    // Prepara o comando SQL
    $allUsers = $conexao->prepare("SELECT * FROM user");

    // Executa a consulta SQL e retorna os resultados em um array associativo
    $allUsers->execute();
    $result = $allUsers->get_result();
    $users = array();
    while ($row = $result->fetch_assoc()) {
      $users[] = $row;
    }
    return $users;
   } else {
       //retorna a conexao como erro de conexao 
       return $conexao;
   }
  }

}