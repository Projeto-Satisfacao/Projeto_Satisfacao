export const dashboard1 = (props) => {
  const ctx3 = document.getElementById('myChart3');

  if (props) {
    const { meses, mes } = props;
    const scoreFive = mes.reduce((acc, val, i) => {
      if (val[meses[i]]['scores']) {
        console.log(val[meses[i]]);
        if (val[meses[i]]['scores']['5']);
      }
      return acc;
    }, {});
    console.log(scoreFive);
  }

  if (Chart.getChart('myChart3')) {
    Chart.getChart('myChart3').destroy();
  }

  new Chart(ctx3, {
    type: 'bar',
    data: {
      labels: [
        'Janeiro',
        'Fevereiro',
        'Março',
        'Abril',
        'Maio',
        'Junho',
        'Julho',
        'Agosto',
        'Setembro',
        'Outubro',
        'Novembro',
        'Dezembro',
      ],
      datasets: [
        {
          label: 'Exelente',
          data: [17, 4, 27, 11, 6, 22, 28, 29, 5, 26, 8, 24, 15],
          backgroundColor: ['rgba(16, 168, 55, 0.8)'],
        },
        {
          label: 'Bom',
          data: [13, 9, 3, 22, 30, 6, 14, 2, 25, 19, 10, 21, 8],
          backgroundColor: ['rgba(59, 160, 4, 0.8)'],
        },
        {
          label: 'Regular',
          data: [7, 30, 25, 12, 20, 23, 26, 1, 16, 8, 2, 19, 14],
          backgroundColor: ['rgba(255, 144, 4, 0.8)'],
        },
        {
          label: 'Ruim',
          data: [30, 8, 12, 27, 3, 10, 1, 15, 14, 21, 24, 20, 23],
          backgroundColor: ['rgba(124, 4, 0, 0.8)'],
        },
        {
          label: 'Péssimo',
          data: [18, 21, 28, 9, 7, 2, 6, 29, 27, 19, 10, 13, 4],
          backgroundColor: ['rgba(183, 0, 0, 0.8)'],
        },
      ],
    },
    options: {
      plugins: {
        title: {
          display: true,
          text: 'Votações por mês',
        },
      },
      maintainAspectRatio: false,
      width: 2000,
      height: 800,
      scales: {
        x: {
          stacked: true,
        },
        y: {
          stacked: true,
          beginAtZero: true,
        },
      },
    },
  });
};

export const dashboard2 = (arr = [0, 1]) => {
  const ctx2 = document.getElementById('myChart2');

  /*
   * Gráfico de pizza resumido com apenas avaliações Exelentes e Péssimas;
   * Filtro de data funciona por dia. poderá ser escolhido o dia que se quer ver os resultados (isso pode mudar caso seja mais pertinente);
   *
   * [EXPLICAÇÃO DAS PARTES IMPORTANTES DO GRÁFICO]
   *
   * labels: representa, nesse gráfico, as categorias que recebem os dados.
   * label: representa a quantidade de votos.
   * data: representa os dados daquela categoria (2 valores seguindo a quantidade de strings em LABELS).
   * backgroundColor: representa a cor das fatias do gráfico.
   */

  if (Chart.getChart('myChart2')) {
    Chart.getChart('myChart2').destroy();
  }

  new Chart(ctx2, {
    type: 'pie',
    data: {
      labels: ['Excelente', 'Péssimo'],
      datasets: [
        {
          label: 'Quantidade de votos',
          data: arr,
          backgroundColor: ['rgba(16, 168, 55, 0.8)', 'rgba(183, 0, 0, 0.8)'],
        },
      ],
    },
    options: {
      plugins: {
        title: {
          display: true,
          text: 'Resumo Exelente/Péssimo',
        },
      },
      maintainAspectRatio: true,
      width: 800,
      height: 800,
      scales: {},
    },
  });
};

export const dashboard3 = (arr = [1, 0, 0, 0, 0]) => {
  const ctx = document.getElementById('myChart');
  let chart1 = null;
  /*
   * Gráfico donut completo com todas as categorias de avaliação;
   * Filtro de data deve ter os dias do banco de dados (isso pode ser alterado caso seja mais pertinente);
   *
   * [EXPLICAÇÃO DAS PARTES IMPORTANTES DO GRÁFICO]
   *
   * labels: representa, nesse gráfico, as categorias que recebem os dados.
   * label: representa a quantidade de votos.
   * data: representa os dados daquela categoria (5 valores seguindo a quantidade de strings em LABELS).
   * backgroundColor: representa a cor das fatias do gráfico.
   *
   */

  if (Chart.getChart('myChart')) {
    Chart.getChart('myChart').destroy();
  }

  chart1 = new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ['Excelente', 'Bom', 'Regular', 'Ruim', 'Péssimo'],
      datasets: [
        {
          label: 'Quantidade de votos',
          data: arr,
          borderWidth: 1,
          backgroundColor: [
            'rgba(16, 168, 55, 0.8)',
            'rgba(59, 160, 4, 0.8)',
            'rgba(255, 144, 4, 0.8)',
            'rgba(124, 4, 0, 0.8)',
            'rgba(183, 0, 0, 0.8)',
          ],
        },
      ],
    },
    options: {
      plugins: {
        title: {
          display: true,
          text: 'Votações geral',
        },
      },
      maintainAspectRatio: false,
      width: 800,
      height: 800,
      scales: {},
    },
  });
  return chart1;
};

dashboard1();
dashboard2();
dashboard3();
