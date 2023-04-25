<?php

/**
 * Classe responsável por exibir a lista de usuários e seus detalhes
 */
require_once("../autoload.php");

class UserListView {

  /**
  * Exibe a lista de usuários para o usuário
  * @return void
  * 
  * Descrição:
  * Esse método exibe a lista de usuários completa em uma tabela HTML.
  * 
  * Entradas:
  * Este método não tem entradas.
  * 
  * Saídas:
  * Este método não retorna nenhuma saída.
 */
  public function displayUserList() {
    // Código do método
    /**
     * Esse método deve definir o caminho da página que HTML onde está a tabela com a lista de usuários.
     * Ele será chamado pelo Menu do sistema e sua única função é exibir a página. 
     */
    $users = (new \App\Controller\UserController)->users();

    foreach($users as $users){

      echo "<tr>";

      echo "<td>{$users['idUser']}"?> <button></button> <?php "</td>";
      echo "<td>{$users['username']}"./**<button></button>/"</td>";
      echo "<td>{$users['email']}"./<button></button>*/"</td>";
      if($users['status'] == 1){
        echo "<td>Administrador</td>";
      } else {
        echo "<td>Usuário"?> <button></button> <?php "</td>";
      }

      echo "</tr>";

    }
  }

  /**
  * Exibe a lista de usuários filtrados para o usuário
  * @param array $userData - Filtro a ser aplicado na lista de usuários
  * @return void
  * 
  * Descrição:
  * Este método exibe a lista de usuários filtrados com base nas informações fornecidas na entrada $userData.
  * 
  * Entradas:
  * - $userData: um array contendo os dados do filtro a ser aplicado na lista de usuários. Os campos possíveis são:
  *   - 'id': para filtrar por ID de usuário
  *   - 'name': para filtrar por nome de usuário
  *   - 'email': para filtrar por e-mail de usuário
  * 
  * Saídas:
  * Este método não retorna nenhuma saída.
  * 
  * Requisitos:
  * Este método requer que o método correspondente do controlador seja implementado para buscar a lista filtrada de usuários.
  * Exemplo: getById($userData['valorBuscado'])
 */
  public function displayFilteredUserList($userData) {
    // Código do método
    /**
     * Esse método possui a mesmo função do método anterior, a diferença entre eles é que
     * ao contrário do outro que exibe a lista completa, esse aqui exibe a página apenas com os resultados filtrados.
     * Ele será chamado por algum botão da página e esse botão deve indicar qual é o filtro que deseja realizar.
     * Exemplo: Preciso filtrar os usuários por ID. Preencho o input dizendo qual é o valor que eu quero e qual o método.
     * Método do Controller: getById($userData['valorBuscado'])
     */
  }

  /**
  * Exibe os detalhes de um usuário selecionado
  * @return void
  * 
  * Descrição:
  * Este método exibe os detalhes do usuário selecionado em uma página separada.
  * 
  * Entradas:
  * Este método não tem entradas.
  * 
  * Saídas:
  * Este método não retorna nenhuma saída.
  * 
  * Requisitos:
  * Este método requer que o método correspondente do controlador seja implementado para buscar os detalhes do usuário selecionado.
 */
  public function displayUserDetails() {
    // Código do método
    /**
     * Esse método deve exibir os detalhes do usuário. Por exemplo, ao clicar no nome dele, é exibido os dados dele (username, e-mail e status).
     * Ele será chamado por um algum campo de tabela e a sua única função é exibir essa página com os dados.
     */
  }
}
