import createFormElements from './CreateFormElements.js';
import Modal from './OpenModal.js';

const setorInputs = {
  inputs: [
    { placeholder: 'Nome do departamento', id: 'idDep', label: 'Departamento', type: 'text' },

    { placeholder: 'Digite o endereço', id: 'local', label: 'Endereço', type: 'text' },

    { placeholder: 'O que esse departamento faz?', id: 'descricao', label: 'Descrição', type: 'text' },
  ],
};

const localInputs = {
  inputs: [
    {
      placeholder: 'Digite a rua, bairro, cidade e estado',
      id: 'endereco',
      label: 'Endereço',
      type: 'text',
      required: true,
    },

    { placeholder: 'Digite uma descrição', id: 'descricao', label: 'Descrição', type: 'text' },
  ],
};

const usuarioInputs = {
  inputs: [
    { placeholder: 'Digite seu nome', id: 'nomeUsuario', label: 'NOME', type: 'text' },

    { placeholder: 'Digite seu e-mail', id: 'emailUsuario', label: 'E-MAIL', type: 'email' },

    { placeholder: 'Digite sua senha', id: 'senhaUsuario', label: 'SENHA', type: 'password' },

    { placeholder: 'Digite novamente sua senha', id: 'senhaUsuario2', label: 'CONFIRMAR SENHA', type: 'password' },
    
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