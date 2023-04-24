<?php

namespace App\View;


/**
 * Classe responsável pelos dados do formulário de criação ou edição de um local e seus detalhes
 */
require_once("autoload.php");
require_once("error.php");

use Exception;

class LocalFormView {

  /**
  * Exibe o formulário para criação ou edição de um local
  * @param array|null $localData - Dados do local a ser editado, caso seja uma edição
  * 
  * Descrição:
  * Este método exibe o formulário para criação ou edição de um local, preenchendo os campos com os dados de $localData, caso seja uma edição, ou deixando-os em branco, caso seja uma criação.
  * 
  * Entradas:
  * - $localData: um array contendo os dados do local a ser editado, caso seja uma edição. Se for uma criação, $localData deve ser nulo.
  * 
  * Saídas:
  * Este método não retorna nenhuma saída.
  */
  public function displayLocalForm($localData) {
    // Código do método
    /**
     * Esse método deve definir o caminho da página que HTML onde está a página de criação/edição de locais.
     * Ele será chamado pelo Menu do sistema e sua única função é exibir a página.
     * A validação vai ocorrer a partir da variável $localData. Se estiver nula, então é criação e os campos aparecem em branco.
     * Caso não esteja nula, ele deve preencher os campos com os valores da variável, permitindo que o usuário os altere.
     */
      
  }

  /**
  * Envia os dados do formulário de criação ou edição de local para o controlador
  * @param array $localData - Dados do local informados no formulário
  * @return array - Array com os dados do local submetidos no formulário
  * 
  * Descrição:
  * Este método recebe os dados do formulário preenchido e os envia para o controlador, fazendo as validações necessárias.
  * 
  * Entradas:
  * - $localData: um array contendo os dados do local informados no formulário.
  * 
  * Saídas:
  * Este método retorna um array com os dados do local submetidos no formulário.
  * 
  * Requisitos:
  * Este método requer que as validações necessárias sejam feitas antes de chamar o método correspondente do controlador.
  * Exemplo: store($localData) em caso de criação e update($localData) no caso de edição.
  */
  public function getLocalFormData($localData) {
    // Código do método
    /**
     * Esse método é o responsável por receber os dados do formulário preenchido e encaminhar para o controller.
     * Dentro dele devem ser feitas as validações do que foi preenchido pelo usuário.
     * Exemplos de validações:
     * - Verificar se todos os campos estão preenchidos;
     * - Sanitizar os dados antes de chamar o controller.
     * O método do controller que recebe esses dados é o store($localData) em caso de criação e update($localData) no caso de edição.
     */
    try {
      // Verifica se todos os campos obrigatórios foram preenchidos
      if (empty($localData['local']) || empty($localData['address']) || empty($localData['url']))  {
        echo '<div class="custom-modal" id="customModal">
                <div class="custom-modal-content">
                  <p>Por favor, preencha todos os campos obrigatórios.</p>
                  <button onclick="hideModal()">Fechar</button>
                </div>
              </div>';
      }
      else
      {
        $localModel = ((new \App\Model\LocalModel()))->createLocal($localData['local'], $localData['address'], $localData['url']);
      }
    } catch (Exception $e) {
        // Exibir mensagem de erro para o usuário
        echo '[ATENÇÃO] ' . $e->getMessage();
    }

  }
}