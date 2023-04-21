import createFormElements from './CreateFormElements.js';
import Modal from './OpenModal.js';

const setorInputs = {
  inputs: [
    {
      placeholder: 'Nome do departamento',
      id: 'department',
      label: 'DEPARTAMENTO',
      type: 'text',
    },

    { placeholder: 'Digite o endereço', id: 'local', label: 'ENDEREÇO', type: 'text' },

    {
      placeholder: 'O que esse departamento faz?',
      id: 'description',
      label: 'DESCRIÇÂO',
      type: 'text',
    },
  ],
};

const localInputs = {
  inputs: [
    { placeholder: 'Digite um nome', id: 'local', label: 'NOME', type: 'text' },

    {
      placeholder: 'Digite a rua, bairro, cidade e estado',
      id: 'address',
      label: 'Endereço',
      type: 'text',
      required: true,
    },

    { placeholder: 'Digite uma url', id: 'url', label: 'SITE', type: 'text' },
  ],
};

const usuarioInputs = {
  inputs: [
    { placeholder: 'Digite seu nome', id: 'username', label: 'NOME', type: 'text' },

    { placeholder: 'Digite seu e-mail', id: 'email', label: 'E-MAIL', type: 'email' },

    { placeholder: 'Digite sua senha', id: 'password', label: 'SENHA', type: 'password' },

    {
      placeholder: 'Digite novamente sua senha',
      id: 'passwordConfirm',
      label: 'CONFIRMAR SENHA',
      type: 'password',
    },

    { placeholder: 'Digite um status', id: 'status', label: 'STATUS', type: 'input' },
  ],
};

const local = new Modal('#setLocal', {
  createFormElements: () => createFormElements(localInputs),
});

local.init();

const setor = new Modal('#setSetor', {
  createFormElements: () => createFormElements(setorInputs),
});
setor.init();

const usuario = new Modal('#setUsuario', {
  createFormElements: () => createFormElements(usuarioInputs),
});
usuario.init();
