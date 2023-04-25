<?php

/**
 * Classe responsável por exibir a lista de setores e seus detalhes
 */

class DepartmentListView {
  
  /**
  * Exibe a lista de setores para o usuário
  * @param void
  * @return void
  * 
  * Descrição:
  * Este método exibe a lista completa de setores para o usuário.
  * 
  * Entradas:
  * Este método não recebe nenhuma entrada.
  * 
  * Saídas:
  * Este método não retorna nenhuma saída.
  */
  public function displayDepartmentList()
  {
    // Código do método
    /**
     * Esse método deve definir o caminho da página que HTML onde está a tabela com a lista de setores.
     * Ele será chamado pelo Menu do sistema e sua única função é exibir a página. 
     */
  }

  /**
  * Exibe a lista de setores filtrados para o usuário
  * @param array $departmentData - Filtro a ser aplicado na lista de setores
  * @return void
  * 
  * Descrição:
  * Este método exibe a lista de setores filtrados com base nas informações fornecidas na entrada $departmentData.
  * 
  * Entradas:
  * - $departmentData: um array contendo os dados do filtro a ser aplicado na lista de setores. Os campos possíveis são:
  *   - 'id': para filtrar por ID de setor
  *   - 'name': para filtrar por nome de setor
  *   - 'description': para filtrar por descrição de setor
  * 
  * Saídas:
  * Este método não retorna nenhuma saída.
  * 
  * Requisitos:
  * Este método requer que o método correspondente do controlador seja implementado para buscar a lista filtrada de setores.
  * Exemplo: getByDepartment($departmentData['valorBuscado'])
  */
  public function displayFilteredDepartmentList($departmentData)
  {
    // Código do método
    /**
     * Esse método possui a mesmo função do método anterior, a diferença entre eles é que
     * ao contrário do outro que exibe a lista completa, esse aqui exibe a página apenas com os resultados filtrados.
     * Ele será chamado por algum botão da página e esse botão deve indicar qual é o filtro que deseja realizar.
     * Exemplo: Preciso filtrar os setores por ID. Preencho o input dizendo qual é o valor que eu quero e qual o método.
     * Método do Controller: getByDepartment($departmentData['valorBuscado'])
     */
  }

  /**
  * Exibe os detalhes de um setor selecionado
  * @param int $idDepartment ID do setor selecionado
  * @return void
  * 
  * Descrição:
  * Este método exibe os detalhes do setor selecionado pelo usuário.
  * 
  * Entradas:
  * - $idDepartment: o ID do setor selecionado pelo usuário.
  * 
  * Saídas:
  * Este método não retorna nenhuma saída.
  * 
  * Requisitos:
  * Este método requer que o método correspondente do controlador seja implementado para buscar os detalhes do setor selecionado.
  * Exemplo: getById($idDepartment)
  */
  public function displayDepartmentDetails($idDepartment)
  {
    // Código do método
    /**
     * Esse método deve exibir os detalhes do setor. Por exemplo, ao clicar no nome dele, é exibido os dados dele (nome e descrição).
     * Ele será chamado por um algum campo de tabela e a sua única função é exibir essa página com os dados.
     */
  }
}
