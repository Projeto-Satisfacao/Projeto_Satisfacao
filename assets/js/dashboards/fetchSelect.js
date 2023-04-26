import { dashboard2, dashboard3, dashboard1 } from './dashboards.js';

export default function importScores() {
  const departments = document.querySelector('.selectDepartment');
  const options = document.querySelectorAll('.allDepartments');

  console.log(departments);
  console.log(options);

  const selectDepartment = ({ target }) => {
    const department = options[target.options.selectedIndex - 1];
    fetchDeparment(department.id);
  };

  const fetchDeparment = async (id) => {
    const { origin, pathname } = window.location;

    const nomeDaPasta = pathname.split('/')[1];

    const formData = new FormData();
    formData.append('dpDashboard', +id);

    let json;
    try {
      const response = await fetch(`${origin}/${nomeDaPasta}/action_page.php`, {
        method: 'POST',
        body: formData,
      });
      if (!response.ok) throw new Error('Não foi possivel realizar esta ação');
      json = await response.json();
      if (json.length < 1) throw new Error('Não há avaliações neste departamento');
    } catch (error) {
      alert(error);
      dashboard3();
      dashboard2();
      return null;
    }

    const scores = json.map((item) => {
      return item.score;
    });

    console.log(json);

    setValuesInDashboard(scores, json);
  };

  const scoresMesesAno = (json) => {
    const scores_mes = json.reduce((acc, val) => {
      const { score, createdat } = val;
      const mes = createdat.split('-')[1];
      if (!acc[mes]) {
        acc[mes] = {
          // novo objeto para o mês
          scores: { [score]: 1 }, // score inicial
        };
      } else {
        if (!acc[mes].scores[score]) {
          acc[mes].scores[score] = 1; // novo score
        } else {
          acc[mes].scores[score]++; // adicionar 1 ao score existente
        }
      }

      return acc;
    }, {});

    const meses = [
      'janeiro',
      'fevereiro',
      'março',
      'abril',
      'maio',
      'junho',
      'julho',
      'agosto',
      'setembro',
      'outubro',
      'novembro',
      'dezembro',
    ];

    const mes = meses.map((m, i) => {
      return { [m]: scores_mes[`0${i + 1}`] || 0 };
    });
    return { meses, mes };
  };

  const setValuesInDashboard = (scores, json) => {
    const contador = scores.reduce((acc, val) => {
      acc[val] = (acc[val] || 0) + 1;
      return acc;
    }, {});
    const uniqueScores = [...new Set([1, 2, 3, 4, 5])]; // obtem todos os valores unicos na matriz original

    uniqueScores.forEach((val) => {
      if (!contador.hasOwnProperty(val)) {
        // verifica se o valor existe no objeto de contagem
        contador[val] = 0; // define a contagem para 0, se não existir
      }
    });
    const allScores = Object.values(contador).reverse();
    const excelente_pessimo = [contador['5'], contador['1']];
    const mesesScores = scoresMesesAno(json);
    console.log(mesesScores);
    dashboard3(allScores);
    dashboard2(excelente_pessimo);
    dashboard1(mesesScores);
  };

  departments.addEventListener('change', selectDepartment);
}

importScores();
