<?php

namespace App\Controller;

/**
 * Classe responsável pelo controle dos usuários
 */

require_once("core/Log.php");

use Exception;

class UserController {

  private $users;
  private $email;
  private $password;
  private $status;

  /**
  * Envia os dados do formulário de criação ou edição de local para o controlador responsável
  * @return array - Array com os dados do local submetidos no formulário
  */
  public function getLoginFormData($email, $password) {
    // Código do método
    if ((new \App\Controller\UserController())->login($email, $password) === true) {
      // Usuário autenticado com sucesso

      // Registra a LOG de entrada
      $message = 'Realizou login no sistema';
      \App\Core\Logger::logUser($message);

      // Redirecionar para a página inicial
      header("Location: pages/index-cadastros.php");
      exit; 
    } 
  }

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
        return '[ATENÇÃO] ERRO AO TENTAR REALIZAR O LOGIN' . $e->getMessage();
    }

    // Implementar os métodos que verificam as informações no banco para fazer a autenticação
    $userData = (new \App\Model\UserModel())->getByEmail($email);
    
    try {
      // Verifica se o usuário existe
      if (!$userData) {
        throw new Exception('Usuário não encontrado.');
        return false;
      } 
    } catch (Exception $e) {
        // Exibir mensagem de erro para o usuário
        return '[ATENÇÃO] ERRO AO TENTAR REALIZAR O LOGIN' . $e->getMessage();
    }

    // Verifica se a senha está correta
    if ($userData && $password == $userData[0]['password']) {
      // Autenticação bem sucedida
      // Define o usuário da sessão
      $_SESSION['usuario'] = $email;

      // Define o usuário da sessão é administrador
      $this->isAdmin($email);

      return true;
    } else {
      // Autenticação falhou
      return '[ATENÇÃO] A senha informada está incorreta.';
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
  * @param int $email - E-mail
  * @return boolean - Verdadeiro se o usuário tiver permissão, falso caso contrário (false = usuário comum, true = administrador)
  */
  private function isAdmin($email)
  {
    // Código do método
    // Implementa o método getById() da Classe UserModel para obter os dados do usuário cadastrados no sistema
    $userData = (new \App\Model\UserModel())->getByEmail($email);

    // Verifica se o usuário é um administrador
    $_SESSION['admin'] = $userData[0]['status'];
    return $_SESSION['admin'];
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
        return '[ATENÇÃO] ' . $e->getMessage();
        exit;
    }


    try {
      // Verifica se o e-mail é válido
      if (!$this->isValidEmail($data['email'])) {
        throw new Exception('O e-mail informado não é válido. Verifique se digitou corretamente.');
      }
    } catch (Exception $e) {
        // Exibir mensagem de erro para o usuário
        return '[ATENÇÃO] ' . $e->getMessage();
        exit;
    }

    try {
      // Verifica se a senha é válida
      if (!$this->isValidPassword($data['password'])) {
        throw new Exception('A senha deve ter pelo menos 6 caracteres.');
      }
    } catch (Exception $e) {
        // Exibir mensagem de erro para o usuário
        return '[ATENÇÃO] Senha inválida' . $e->getMessage();
        exit;
    }

    // Define as variáveis para validação
    $email = $data['email'];
    $password = $data['password'];
    $username = $data['username'];

    // Instancia um objeto da classe UserModel e salva os dados do usuário no banco de dados
    if ($this->isValidEmail($email) && $this->isValidPassword($password)) {
      $newUser = (new \App\Model\UserModel())->createUser($data['username'], $data['email'], md5($data['password']), $data['status']);      
      
      // Criação do novo usuário bem sucedida      
      if (is_integer($newUser)){      
        return $newUser;
      } elseif((get_class($newUser)== "mysqli_sql_exception") && ($newUser->getCode() == 1062)){
        return("1062: [ATENÇÃO] O nome de usuário já está em uso. Por favor, escolha outro nome.");
      }else{
        return("[ATENÇÃO] Ocorreu um erro ao processar sua solicitação. Por favor, tente novamente mais tarde.");
      }

      // Registra a LOG de criação do usuário
      $message = 'Cadastrou um novo usuário \n [USUÁRIO CADASTRADO]: {$username}';
      \App\Core\Logger::logUser($message);
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
        return '[ATENÇÃO] ' . $e->getMessage();
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
        return '[ATENÇÃO] ERRO AO TENTAR ATUALIZAR O USUARIO' . $e->getMessage();
        exit;
    }

    // Verifica se o e-mail é válido
    if (!$this->isValidEmail($data['email'])) {
      // Exibir mensagem de erro para o usuário
      return '[ATENÇÃO] O e-mail informado não é válido. Verifique se digitou corretamente.';
      exit;
    }

    // Verifica se a senha é válida
    if (!$this->isValidPassword($data['password'])) {
      // Exibir mensagem de erro para o usuário
      return '[ATENÇÃO] A senha deve ter pelo menos 6 caracteres.';
      exit;
    }
    // Define as variáveis para validação
    $email = $data['email'];
    $password = $data['password'];
    $username = $data['username'];

    // Instancia um objeto da classe UserModel e salva os dados do usuário no banco de dados
    if ($this->isValidEmail($email) && $this->isValidPassword($password)) {
      $editUser = (new \App\Model\UserModel())->updateUser($idUser, $data['username'], $data['email'], $data['password'], $data['status']);
      // Atualização do usuário bem sucedida
      if (is_integer($editUser)){      
        return true;  
      }else{
        return("[ATENÇÃO] Ocorreu um erro ao tentar atualizar, tente novamente mais tarde.");
      }
      
      // Registra a LOG de atualização do usuário
      $message = 'Atualizou as informações de um usuário \n [USUÁRIO ATUALIZADO]: {$username}';
      \App\Core\Logger::logUser($message);
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
      // Exclusão do usuário bem sucedida
      return ($deleteUser) ? true : false;

      // Registra a LOG de exclusão do usuário
      $message = 'Deletou um usuário \n [ID DELETADO]: {$idUser}';
      \App\Core\Logger::logUser($message);
    } 
    // Redireciona para a página de listagem de usuários
    header("Location: /UserListView.php");
    exit;
  }

  
}