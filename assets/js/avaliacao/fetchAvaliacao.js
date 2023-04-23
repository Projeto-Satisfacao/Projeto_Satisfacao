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
    const { origin, pathname } = window.location;

    const nomeDaPasta = pathname.split('/')[1];

    const formData = new FormData();
    formData.append('score', +score);

    const response = await fetch(`${origin}/${nomeDaPasta}/action_page.php`, {
      method: 'POST',
      body: formData,
    });
    console.log(response);
  };

  btns.forEach((btn) => {
    btn.addEventListener('click', handleClick);
  });
};

fetchAvaliacao();
