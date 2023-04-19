<?php

/**
 * Classe responsável por exibir a lista de locais para o usuário
 */

class LocalListView {

  /**
  * Exibe a lista de locais para o usuário.
  * @param void
  * @return void
  * 
  * Descrição:
  * Este método exibe a lista de locais disponíveis no sistema para o usuário.
  * 
  * Entradas:
  * Este método não possui nenhuma entrada.
  * 
  * Saídas:
  * Este método não retorna nenhuma saída.
  * 
  * Requisitos:
  * Este método requer que o método correspondente do controlador seja implementado para buscar a lista completa de locais.
  * Exemplo: getAll()
  */
  public function displayLocalList() {
    // Código do método
    /**
     * Esse método deve definir o caminho da página que HTML onde está a tabela com a lista de locais.
     * Ele será chamado pelo Menu do sistema e sua única função é exibir a página. 
     */
  }

  /**
  * Exibe a lista de locais filtrados para o usuário.
  * @param array $localData - Filtro a ser aplicado na lista de locais
  * @return void
  * 
  * Descrição:
  * Este método exibe a lista de locais filtrados com base nas informações fornecidas na entrada $localData.
  * 
  * Entradas:
  * - $localData: um array contendo os dados do filtro a ser aplicado na lista de locais. Os campos possíveis são:
  *   - 'id': para filtrar por ID do local
  *   - 'name': para filtrar por nome do local
  *   - 'address': para filtrar por endereço do local
  * 
  * Saídas:
  * Este método não retorna nenhuma saída.
  * 
  * Requisitos:
  * Este método requer que o método correspondente do controlador seja implementado para buscar a lista filtrada de locais.
  * Exemplo: getByLocal($localData['valorBuscado'])
  */
  public function displayFilteredLocalList($localData) {
    // Código do método
    /**
     * Esse método possui a mesmo função do método anterior, a diferença entre eles é que
     * ao contrário do outro que exibe a lista completa, esse aqui exibe a página apenas com os resultados filtrados.
     * Ele será chamado por algum botão da página e esse botão deve indicar qual é o filtro que deseja realizar.
     * Exemplo: Preciso filtrar os locais por ID. Preencho o input dizendo qual é o valor que eu quero e qual o método.
     * Método do Controller: getByLocal($localData['valorBuscado'])
     */
  }

  /**
  * Exibe os detalhes de um local selecionado pelo usuário.
  * @param int $idLocal - ID do local a ser exibido os detalhes
  * @return void
  * 
  * Descrição:
  * Este método é responsável por exibir os detalhes de um local específico selecionado pelo usuário, com base no ID do local fornecido na entrada $idLocal.
  * 
  * Entradas:
  * - $idLocal: um inteiro contendo o ID do local a ser exibido os detalhes.
  * 
  * Saídas:
  * Este método não retorna nenhuma saída.
  * 
  * Requisitos:
  * Este método requer que o método correspondente do controlador seja implementado para buscar os detalhes do local.
  * Exemplo: getById($idLocal)
  */
  public function displayLocalDetails($idLocal) {
    // Código do método
    /**
     * Esse método deve exibir os detalhes do local. Por exemplo, ao clicar no nome dele, é exibido os dados dele (nome, endereço e url).
     * Ele será chamado por um algum campo de tabela e a sua única função é exibir essa página com os dados.
     */
  }
}
