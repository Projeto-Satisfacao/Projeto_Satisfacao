const fetchAvaliacao = () => {
  const btns = document.querySelectorAll('.section-button label a');

  const handleClick = (event) => {
    event.preventDefault();
    const { target } = event;
    let element = target;
    if (target.nodeName === 'IMG' || target.tagName === 'IMG') {
      element = target.parentElement;
    }

    const score = element.getAttribute('data-score');
    fetchScore(score);
  };

  const fetchScore = async (score) => {
    if (localStorage.getItem('departamento')) {
      const { origin, pathname } = window.location;

      const nomeDaPasta = pathname.split('/')[1];

      const idDepartamento = localStorage.getItem('departamento');

      const formData = new FormData();
      formData.append('score', +score);
      formData.append('departamento', +idDepartamento);

      const response = await fetch(`${origin}/${nomeDaPasta}/action_page.php`, {
        method: 'POST',
        body: formData,
      });

      if (response.ok) {
        window.location.replace(
          `${origin}/${nomeDaPasta}/pages/index-agradecimento.html`,
        );
      }
    } else {
      alert('É necessário que um departamento esteja associado');
    }
  };

  btns.forEach((btn) => {
    btn.addEventListener('click', handleClick);
  });
};

fetchAvaliacao();
