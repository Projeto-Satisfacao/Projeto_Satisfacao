<?php

namespace App\View;


/**
 * Classe responsável pelos dados do formulário de criação ou edição de um setor e seus detalhes
 */
require_once("autoload.php");
require_once("error.php");

use Exception;

class DepartmentFormView {

  /**
  * Exibe o formulário para criação ou edição de um setor
  * 
  * @param array|null $departmentData - Dados do setor a ser editado, caso seja uma edição
  * 
  * Descrição:
  * Este método exibe o formulário de criação ou edição de um setor com base nos dados fornecidos na entrada $departmentData. 
  * Se a variável $departmentData for nula, o formulário será exibido para criação de um novo setor. Caso contrário, 
  * os campos serão preenchidos com os valores existentes no $departmentData, permitindo que o usuário os altere.
  * 
  * Entradas:
  * - $departmentData: um array contendo os dados do setor a ser editado, caso seja uma edição. Os campos possíveis são:
  *   - 'id': (opcional) id do setor a ser editado
  *   - 'name': (opcional) nome do setor a ser editado
  *   - 'description': (opcional) descrição do setor a ser editado
  * 
  * Saídas:
  * Este método não retorna nenhuma saída.
  * 
  * Requisitos:
  * Este método requer que o formulário HTML correspondente seja criado e disponibilizado no sistema.
  * 
  */
  public function displayDepartmentForm($departmentData) {
    // Código do método
    /**
     * Esse método deve definir o caminho da página que HTML onde está a página de criação/edição de setores.
     * Ele será chamado pelo Menu do sistema e sua única função é exibir a página.
     * A validação vai ocorrer a partir da variável $departmentData. Se estiver nula, então é criação e os campos aparecem em branco.
     * Caso não esteja nula, ele deve preencher os campos com os valores da variável, permitindo que o usuário os altere.
     */
  }

  /**
  * Envia os dados do formulário de criação ou edição do setor para o controlador
  * 
  * @param array $departmentData - Dados do setor informados no formulário
  * @return array - Array com os dados do Department submetidos no formulário
  * 
  * Descrição:
  * Este método é responsável por receber os dados do formulário de criação ou edição de um setor preenchido pelo usuário e encaminhá-los
  * para o controlador correspondente, realizando as validações necessárias antes de fazer a chamada.
  * 
  * Entradas:
  * - $departmentData: um array contendo os dados do setor submetidos no formulário. Os campos possíveis são:
  *   - 'id': (opcional) id do setor, utilizado apenas em caso de edição
  *   - 'name': nome do setor
  *   - 'description': descrição do setor
  * 
  * Saídas:
  * - Um array contendo os dados do setor submetidos no formulário.
  * 
  * Requisitos:
  * Este método requer que o controlador correspondente tenha os métodos store($departmentData) e update($departmentData) implementados,
  * para criação e edição de setores, respectivamente.
  */
  public function getDepartmentFormData($departmentData) {
    // Código do método
    /**
     * Esse método é o responsável por receber os dados do formulário preenchido e encaminhar para o controller.
     * Dentro dele devem ser feitas as validações do que foi preenchido pelo usuário.
     * Exemplos de validações:
     * - Verificar se todos os campos estão preenchidos;
     * - Sanitizar os dados antes de chamar o controller.
     * O método do controller que recebe esses dados é o store($departmentData) em caso de criação e update($departmentData) no caso de edição.
     */
    try
    {
      // Verifica se todos os campos obrigatórios foram preenchidos
      if (empty($departmentData['department']) || empty($departmentData['description']) || empty($departmentData['idLocal']))
      {
        echo '<div class="custom-modal" id="customModal">
                <div class="custom-modal-content">
                  <p>Por favor, preencha todos os campos obrigatórios.</p>
                  <button onclick="hideModal()">Fechar</button>
                </div>
              </div>';
      }

      else
      {
        $surveyModel = ((new \App\Model\DepartmentModel())->createDepartment($departmentData['department'],
                                                                             $departmentData['description'],
                                                                             $departmentData['idLocal']));
      }
    } 
    
    catch (Exception $e)
    {
        // Exibir mensagem de erro para o usuário
        echo '[ATENÇÃO] ' . $e->getMessage();
    }

  }
}