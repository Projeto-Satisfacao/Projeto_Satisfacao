export default function CreateFormElements({ inputs }) {
  const container = document.querySelector('.modal-content .container');

  inputs.forEach(({ placeholder, id, label, type }) => {
    const labelEl = document.createElement('label');
    labelEl.innerText = label;
    labelEl.setAttribute('for', id);

    const inputEl = document.createElement('input');
    inputEl.type = type;
    inputEl.placeholder = placeholder;
    inputEl.id = id;
    inputEl.name = id;
    inputEl.required = true;

    if (inputEl.type === 'password') {
      inputEl.minLength = 6;
    }

    container.appendChild(labelEl);
    container.appendChild(inputEl);
  });

  return container;
}
