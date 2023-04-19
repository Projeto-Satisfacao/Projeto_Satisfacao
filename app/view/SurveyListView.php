<?php

/**
 * Classe responsável por exibir a lista de avaliações e seus detalhes
 */

class SurveyListView {

  /**
  * Exibe a lista de avaliações para o usuário.
  * @param void
  * @return void
  *
  * Descrição:
  * Este método exibe a lista de todas as avaliações registradas no sistema.
  *
  * Entradas:
  * Este método não recebe nenhuma entrada.
  *
  * Saídas:
  * Este método não retorna nenhuma saída.
  */
	public function displaySurveyList() {
		// Código do método
		/**
     * Esse método deve definir o caminho da página que HTML onde está a tabela com a lista de avaliações registradas.
     * Ele será chamado pelo Menu do sistema e sua única função é exibir a página. 
     */

     
	}
	
  /**
  * Exibe a lista de avaliações filtradas para o usuário.
  * @param array $surveyData - Filtro a ser aplicado na lista de avaliações.
  * @return void
 *
  * Descrição:
  * Este método exibe a lista de avaliações filtradas com base nas informações fornecidas na entrada $surveyData.
 *
  * Entradas:
  * - $surveyData: um array contendo os dados do filtro a ser aplicado na lista de avaliações. Os campos possíveis são:
  *   - 'id': para filtrar por ID da avaliação
  *   - 'sector': para filtrar por setor da avaliação
  *   - 'location': para filtrar por local da avaliação
  *   - 'score': para filtrar por nota da avaliação
  *   - 'reason': para filtrar por motivo da avaliação
  *   - 'date': para filtrar por data da avaliação
 *
  * Saídas:
  * Este método não retorna nenhuma saída.
 *
  * Requisitos:
  * Este método requer que o método correspondente do controlador seja implementado para buscar a lista filtrada de avaliações.
  * Exemplo: getById($surveyData['valorBuscado'])
 */
	public function displayFilteredSurveyList($surveyData) {
		// Código do método
		/**
     * Esse método possui a mesmo função do método anterior, a diferença entre eles é que
     * ao contrário do outro que exibe a lista completa, esse aqui exibe a página apenas com os resultados filtrados.
     * Ele será chamado por algum botão da página e esse botão deve indicar qual é o filtro que deseja realizar.
     * Exemplo: Preciso filtrar os setores por ID. Preencho o input dizendo qual é o valor que eu quero e qual o método.
     * Método do Controller: getById($surveyData['valorBuscado'])
     */
	}
	
  /**
  * Exibe os detalhes de uma avaliação selecionada.
  * @param int $idSurvey - ID da avaliação selecionada.
  * @return void
  *
  * Descrição:
  * Este método exibe os detalhes da avaliação selecionada com base no ID fornecido na entrada $idSurvey.
  *
  * Entradas:
  * - $idSurvey: o ID da avaliação selecionada.
  *
  * Saídas:
  * Este método não retorna nenhuma saída.
  *
  * Requisitos:
  * Este método requer que o método correspondente do controlador seja implementado para buscar os detalhes da avaliação selecionada.
  * Exemplo: getById($idSurvey)
 */
	public function displaySurveyDetails($idSurvey) {
		// Código do método
		/**
     * Esse método deve exibir os detalhes da avaliação. Por exemplo, ao clicar no número dela, é exibido os dados (local, setor, nota, motivo e data).
     * Ele será chamado por um algum campo de tabela e a sua única função é exibir essa página com os dados.
     */
	}
	
  /**
  * Exibe o dashboard com os resultados das avaliações
  * @param void
  * @return void
  * 
  * Descrição:
  * Este método exibe o dashboard com os resultados das avaliações realizadas pelo sistema.
  * 
  * Entradas:
  * Este método não possui entradas.
  * 
  * Saídas:
  * Este método não retorna nenhuma saída.
  * 
  * Requisitos:
  * Este método requer que o método correspondente do controlador seja implementado para buscar os dados necessários para exibir o dashboard.
 */
	public function displayDashboard() {
		// Código do método
		/**
     * Esse método deve definir o caminho da página que HTML onde está a tabela com o dashboard de resultados.
     * Ele será chamado pelo Menu do sistema e sua única função é exibir a página. 
     */
	}
}