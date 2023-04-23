let speakButton = document.querySelector('#speak');

speakButton.addEventListener('click', () => {
  if (!synth.speaking) {
    lerPagina();
  } else {
    alert('A página já está sendo lida.');
  }
});

const synth = window.speechSynthesis; // Ativação da leitura de tela da API

/**
 * Função principal para ler a página
 */
function falarTexto(texto) {
  if (!synth) {
    //Se o navegador não for suportado vai aparecer esse mensagem
    alert('A API não é suportada neste navegador.');
    return;
  }

  /**
   * const utterance = Constante que carrega a função de leitura de páginas da API
   * utterance.lang = Linguagem da voz que vai falar
   * utterance.rate = velocidade da leitura
   */
  const utterance = new SpeechSynthesisUtterance(texto);
  utterance.lang = 'pt-BR';
  utterance.rate = 1.25;

  synth.speak(utterance);
}

/**
 * Constante texto representa o conteudo que vai lido, esse valor é passado para função falarTexto
 */
function lerPagina() {
  const conteudo = document.querySelector('#conteudo-lido');
  const texto = conteudo.innerText;
  falarTexto(texto);
}

/**
 * Função que faz um loop da leitura da página
 */
function leituraEmLoop() {
  lerPagina();
  setInterval(lerPagina, 50 * 1000); // 50 sec
}

/**
 * Toda vez que a página for carregada é feito uma verificação, se a API estiver lendo a página...
 * ...ele vai cancelar a leitura atual e recomeçar, se não estiver falando, ele vai começar a falar
 */
let intervalo;
window.addEventListener('DOMContentLoaded', (event) => {
  intervalo = setInterval(() => {
    if (synth.speaking) {
      synth.cancel();
      clearInterval(intervalo);
      leituraEmLoop();
    }
  });
  leituraEmLoop();
});
