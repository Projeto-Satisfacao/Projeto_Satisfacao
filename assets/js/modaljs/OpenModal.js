export default class Modal {
  constructor(btnOpenModal, content, btnCloseModal = '.close', modalBg = '.modal-bg') {
    this.btnOpenModal = document.querySelector(btnOpenModal);
    this.btnCloseModal = document.querySelector(btnCloseModal);
    this.modalBg = document.querySelector(modalBg);
    this.content = content;
  }

  openModal() {
    //QUANDO EU CLICAR NO BOTÃO, SERÁ ADICIONADO A CLASS "ACTIVE" NO MODAL
    this.modalBg.classList.add('active');
    this.btnOpenModal.setAttribute('data-open', 'true');
    this.container = this.content.createFormElements();
  }

  closeModal() {
    //QUANDO CLICAR NO "X" IRÁ REMOVER A CLASS "ACTIVE" DO MODAL
    this.modalBg.classList.remove('active');
    this.clearInputs();
  }

  outsideClick(event) {
    if (event.target === this.modalBg) {
      this.modalBg.classList.remove('active');
      this.clearInputs();
    }

    document.documentElement.removeEventListener('click', this.outsideClick);

    setTimeout(() => {
      document.documentElement.addEventListener('click', this.outsideClick);
    });
  }

  addListeners() {
    this.btnOpenModal.addEventListener('click', this.openModal);
    this.btnCloseModal.addEventListener('click', this.closeModal);

    //UTILIZADO PARA QUANDO O USUARIO CLICAR FORA DO MODAL
    document.documentElement.addEventListener('click', this.outsideClick);
  }

  callBackBinds() {
    this.openModal = this.openModal.bind(this);
    this.closeModal = this.closeModal.bind(this);
    this.outsideClick = this.outsideClick.bind(this);
  }

  clearInputs() {
    if (this.container) this.container.innerHTML = '';
  }

  init() {
    if (this.btnOpenModal && this.btnCloseModal) {
      this.callBackBinds();
      this.addListeners();
    }
    return this;
  }
}
