const associarDepartamento = () => {
  const btns = document.querySelectorAll('.btnAssociar');

  if (localStorage.getItem('departamento')) {
    const idItem = localStorage.getItem('departamento');
    btns.forEach((btn) => {
      if (btn.id === idItem) {
        btn.classList.add('active');
        btn.innerText = 'Associado';
      }
    });
  }

  const verificarDepartamento = (id) => {
    if (localStorage.getItem('departamento')) {
      btns.forEach((btn) => {
        btn.classList.remove('active');
        btn.innerText = 'Associar';
        if (btn.id === id) {
          btn.classList.add('active');
          btn.innerText = 'Associado';
        }
      });
    }
  };

  const handleClick = ({ target }) => {
    localStorage.setItem('departamento', target.id);
    verificarDepartamento(target.id);
  };

  btns.forEach((btn) => {
    btn.addEventListener('click', handleClick);
  });
};

associarDepartamento();
