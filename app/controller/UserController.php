<?php

namespace App\Controller;

/**
 * Classe responsável pelo controle dos usuários
 */

use Exception;

class UserController {

  private $users;
  private $email;
  private $password;
  private $status;

  /**
  * Verifica se o e-mail e a senha são válidos
  * @param string $email - E-mail
  * @param string $password - Senha
  * @return boolean - Verdadeiro se a autenticação for bem sucedida, falso caso contrário
  */
  public function login($email, $password)
  {
    // Código do método
    // Verifica se o e-mail e a senha são válidos
    try {
      // Verifica se todos os campos obrigatórios foram preenchidos
      if (empty($this->isValidEmail($email)) || empty($this->isValidPassword($password))) {
        throw new Exception('Por favor, verifique o e-mail e a senha informados.');
      } 
    } catch (Exception $e) {
        // Exibir mensagem de erro para o usuário
        echo '[ATENÇÃO] ' . $e->getMessage();
    }

    // Implementar os métodos que verificam as informações no banco para fazer a autenticação
    $userData = (new \App\Model\UserModel())->getByEmail($email);
    
    try {
      // Verifica se o usuário existe
      if (!$userData) {
        throw new Exception('Usuário não encontrado.');
      } 
    } catch (Exception $e) {
        // Exibir mensagem de erro para o usuário
        echo '[ATENÇÃO] ' . $e->getMessage();
    }

    // Verifica se a senha está correta
    if ($userData && $password == $userData[0]['password']) {
      // Autenticação bem sucedida
      return true;
    } else {
      echo '[ATENÇÃO] A senha informada está incorreta.';
    }
  }

  /**
   * Verifica se o e-mail é válido
   * @param string $email - E-mail a ser validado
   * @return boolean - Verdadeiro se o e-mail é válido, falso caso contrário
   */
  private function isValidEmail($email)
  {
    // Código do método
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false ? true : false;
  }

  /**
   * Verifica se a senha é válida
   * @param string $password - Senha a ser validada
   * @return boolean - Verdadeiro se a senha é válida, falso caso contrário
   */
  private function isValidPassword($password)
  {
    // Código do método
    return strlen($password) >= 6 ? true : false;
  }
  
  /**
  * Verifica se o usuário tem permissão para modificar avaliações
  * @param int $idUser - ID do usuário 
  * @return boolean - Verdadeiro se o usuário tiver permissão, falso caso contrário (false = usuário comum, true = administrador)
  */
  private function isAdmin($idUser)
  {
    // Código do método
    // Implementa o método getById() da Classe UserModel para obter os dados do usuário cadastrados no sistema
    $userData = (new \App\Model\UserModel())->getById($idUser);

    // Verifica se o usuário é um administrador
    return $userData['status'] ? true : false;
  }
  
  /**
  * Lista todos os usuários existentes
  * @return array - Array contendo todos os usuários cadastrados no sistema
  */
  public function users()
  {
    // Código do método
    // Implementa o método getAll() da Classe UserModel para obter todos os usuários cadastrados no sistema
    return (new \App\Model\UserModel())->getAll();
  }
  
  /**
  * Cria um formulário para criação de um novo usuário
  */
  public function create()
  {
    // Código do método
    // Redireciona para a página do formulário de criação de usuário
    header('Location: /UserFormView.php');
    exit;
  }

  /**
  * Processa os dados do formulário de criação do usuário, faz as validações e envia pro Model
  * @param array $data - Dados do usuário a serem cadastrados
  */
  public function store($data)
  {
    // Código do método
    try {
      // Verifica se todos os campos obrigatórios foram preenchidos
      if (empty($data['username']) || empty($data['email']) || empty($data['password'])) {
        throw new Exception('Por favor, preencha todos os campos obrigatórios.');
      }
    } catch (Exception $e) {
        // Exibir mensagem de erro para o usuário
        echo '[ATENÇÃO] ' . $e->getMessage();
        exit;
    }


    try {
      // Verifica se o e-mail é válido
      if (!$this->isValidEmail($data['email'])) {
        throw new Exception('O e-mail informado não é válido. Verifique se digitou corretamente.');
      }
    } catch (Exception $e) {
        // Exibir mensagem de erro para o usuário
        echo '[ATENÇÃO] ' . $e->getMessage();
        exit;
    }

    try {
      // Verifica se a senha é válida
      if (!$this->isValidPassword($data['password'])) {
        throw new Exception('A senha deve ter pelo menos 6 caracteres.');
      }
    } catch (Exception $e) {
        // Exibir mensagem de erro para o usuário
        echo '[ATENÇÃO] ' . $e->getMessage();
        exit;
    }

    // Define as variáveis para validação
    $email = $data['email'];
    $password = $data['password'];

    // Instancia um objeto da classe UserModel e salva os dados do usuário no banco de dados
    if ($this->isValidEmail($email) && $this->isValidPassword($password)) {
      $newUser = (new \App\Model\UserModel())->createUser($data['username'], $data['email'], md5($data['password']), $data['status']);
      // Criação do novo usuário bem sucedida
      return ($newUser) ? true : false;
    } 
  }

  /**
  * Exibe as informações de um usuário existente
  * @param int $id - ID do usuário a ser exibido
  */
  public function show($idUser)
  {
    // Código do método
    // Instancia um objeto da classe UserModel e busca o usuário com o ID informado
    $data = (new \App\Model\UserModel())->getById($idUser);

    try {
      // Verifica se o usuário existe, se o usuário não existir, exibe uma mensagem de erro
      return $data ? $data : throw new Exception('Usuário não encontrado.');
    } catch (Exception $e) {
        // Exibir mensagem de erro para o usuário
        echo '[ATENÇÃO] ' . $e->getMessage();
    }
  }

  /**
  * Cria um formulário para edição de um usuário existente
  * @param int $id - ID do usuário a ser editado
  */
  public function edit($idUser)
  {
    // Código do método
    // Redireciona para a página do formulário de criação de usuário com o ID do usuário a ser editado
    header("Location: /UserFormView.php?idUser={$idUser}");
    exit;
  }

  /**
  * Processa os dados de atualização de um usuário
  * @param int $id - ID do usuário a ser atualizado
  * @param array $data - Dados do usuário a serem atualizados
  */
  public function update($idUser, $data)
  {
    // Código do método
    try {
      // Verifica se todos os campos obrigatórios foram preenchidos
      if (empty($data['username']) || empty($data['email']) || empty($data['password'])) {
        throw new Exception('Por favor, preencha todos os campos obrigatórios.');
      }
    } catch (Exception $e) {
        // Exibir mensagem de erro para o usuário
        echo '[ATENÇÃO] ' . $e->getMessage();
        exit;
    }

    // Verifica se o e-mail é válido
    if (!$this->isValidEmail($data['email'])) {
      // Exibir mensagem de erro para o usuário
      echo '[ATENÇÃO] O e-mail informado não é válido. Verifique se digitou corretamente.';
      exit;
    }

    // Verifica se a senha é válida
    if (!$this->isValidPassword($data['password'])) {
      // Exibir mensagem de erro para o usuário
      echo '[ATENÇÃO] A senha deve ter pelo menos 6 caracteres.';
      exit;
    }
    // Define as variáveis para validação
    $email = $data['email'];
    $password = $data['password'];

    // Instancia um objeto da classe UserModel e salva os dados do usuário no banco de dados
    if ($this->isValidEmail($email) && $this->isValidPassword($password)) {
      $editUser = (new \App\Model\UserModel())->updateUser($idUser, $data['username'], $data['email'], $data['password'], $data['status']);
      // Atualização do usuário bem sucedida
      return ($editUser) ? true : false;
    } 
  }

  /**
  * Remove um usuário existente
  * @param int $id - ID do usuário a ser removido
  */
  public function delete($idUser)
  {
    // Código do método
    // Instancia um objeto da classe UserModel e remove o usuário com o ID especificado
    $deleteUser = (new \App\Model\UserModel())->deleteUser($idUser);

    if ($deleteUser) {
      // Deleção do usuário bem sucedida
      return ($deleteUser) ? true : false;
    } 
    // Redireciona para a página de listagem de usuários
    header("Location: /UserListView.php");
    exit;
  }
}