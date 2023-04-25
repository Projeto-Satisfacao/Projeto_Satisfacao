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
  }

  const scores = json.map((item) => {
    return item.score;
  });

  setValuesInDashboard(scores);
};

const setValuesInDashboard = (scores) => {
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
  console.log(contador);
};

departments.addEventListener('change', selectDepartment);
