<?php

namespace App\View;

/**
 * Classe responsável pelos dados do formulário de criação ou edição de um usuário e seus detalhes
 */
require_once("autoload.php");
require_once("error.php");

use Exception;

class UserFormView {

  /**
  * Exibe o formulário para criação ou edição de um usuário
  * @param array $userData - Dados do usuário (opcional, se não for informado, exibe um formulário em branco para criação)
  * @return void
  * 
  * Descrição:
  * Este método é responsável por exibir o formulário de criação ou edição de usuários. Se o parâmetro $userData for informado, os campos do formulário serão preenchidos com os dados do usuário correspondente. Caso contrário, os campos aparecerão em branco para criação.
  * 
  * Entradas:
  * - $userData: um array contendo os dados do usuário a serem exibidos no formulário. Os campos possíveis são:
  *   - 'id': o ID do usuário a ser editado
  *   - 'name': o nome do usuário a ser exibido no campo correspondente
  *   - 'email': o e-mail do usuário a ser exibido no campo correspondente
  * 
  * Saídas:
  * Este método não retorna nenhuma saída.
  * 
  * Requisitos:
  * Este método requer que a página HTML correspondente esteja disponível na pasta de visualizações do sistema.
 */
  public function displayUserForm() {
    // Código do método
    /**
     * Esse método deve definir o caminho da página que HTML onde está a página de criação/edição de usuários.
     * Ele será chamado pelo Menu do sistema e sua única função é exibir a página.
     * A validação vai ocorrer a partir da variável $userData. Se estiver nula, então é criação e os campos aparecem em branco.
     * Caso não esteja nula, ele deve preencher os campos com os valores da variável, permitindo que o usuário os altere.
     */

    echo '<form name="userData" action="call.php" method="post">
        <input type="text" name="username" placeholder="username">
        <input type="text" name="email" placeholder="email">
        <input type="text" name="password" placeholder="password">
        <input type="text" name="status" placeholder="status">
        <input type="submit" value="Enviar">
    </form>';
  }

  /**
  * Envia os dados do formulário de criação ou edição para o controlador
  * @param array $userData - Dados do usuário informados no formulário
  * @return array - Dados do usuário informados no formulário
  * 
  * Descrição:
  * Este método é responsável por receber os dados do formulário preenchido pelo usuário e encaminhá-los para o controlador correspondente. Antes de fazer isso, ele deve validar os dados inseridos pelo usuário para garantir que eles estejam corretos e de acordo com as regras de negócio do sistema.
  * 
  * Entradas:
  * - $userData: um array contendo os dados informados pelo usuário no formulário. Os campos possíveis são:
  *   - 'id': o ID do usuário (se estiver editando)
  *   - 'name': o nome do usuário
  *   - 'email': o e-mail do usuário
  * 
  * Saídas:
  * - Um array contendo os dados informados pelo usuário no formulário. Os campos possíveis são:
  *   - 'id': o ID do usuário (se estiver editando)
  *   - 'name': o nome do usuário
  *   - 'email': o e-mail do usuário
  * 
  * Requisitos:
  * Este método requer que o formulário correspondente esteja disponível na página HTML definida pelo método displayUserForm(). Além disso, ele deve validar os dados inseridos pelo usuário antes de enviá-los ao controller.
  */
  public function getUserFormData($userData) {
    // Código do método
    /**
     * Esse método é o responsável por receber os dados do formulário preenchido e encaminhar para o controller.
     * Dentro dele devem ser feitas as validações do que foi preenchido pelo usuário.
     * Exemplos de validações:
     * - Verificar se o e-mail está no formato email@email.com;
     * - Verificar se todos os campos estão preenchidos;
     * - Sanitizar os dados antes de chamar o controller.
     * O método do controller que recebe esses dados é o store($userData) em caso de criação e update($userData) no caso de edição.
     */
    try
    {
      // Verifica se todos os campos obrigatórios foram preenchidos
      if (empty($userData['username']) || empty($userData['email']) || empty($userData['password']) || empty($userData['status'])) {
        echo '<div class="custom-modal" id="customModal">
                <div class="custom-modal-content">
                  <p>Por favor, preencha todos os campos obrigatórios.</p>
                  <button class="button-modal" onclick="hideModal()">Fechar</button>
                </div>
              </div>';
      }
      
      else 
      {
        $userModel = ((new \App\Model\UserModel())->createUser($userData['username'], $userData['email'], 
        $userData['password'], $userData['status']));
      }

    }
    
    catch (Exception $e)
    {
        // Exibir mensagem de erro para o usuário
        echo '[ATENÇÃO] ' . $e->getMessage();
    }
  }
}