<h1 align="center">
  <img alt="Logo" title="#SatisCultura" src="./assets/img/satiscultura.png" />
</h1>
<div align="center"> 

![Em desenvolvimento](https://img.shields.io/badge/Status-Em%20desenvolvimento-yellow)

[![Licença GPL v3](https://img.shields.io/badge/licen%C3%A7a-GPL%20v3-blue.svg)](https://www.gnu.org/licenses/gpl-3.0.pt-br.html)

</div>

<p align="center">
 <a href="#sobre">Sobre</a> •
 <a href="#tecnologias">Tecnologias</a> • 
 <a href="#requisitos_sistema">Requisitos do Sistema</a> • 
 <a href="#requisitos_funcionais">Requisitos Funcionais</a> 
</p>

<p align="center">
 <a href="#requisitos_not">Requisitos Não Funcionais</a> •
 <a href="#tecnologias">Tecnologias</a> • 
 <a href="#pre_requisitos">Pré Requisitos</a> • 
 <a href="#licenca">Licença</a> 
</p>

<h2 style="center" id="sobre">👤 Sobre</h2>

A proposta do projeto é a criação de um aplicativo de avaliação para a prefeitura de Camaçari-Ba, com o objetivo de promover transparência e participação cidadã na gestão pública. O aplicativo permitirá que os cidadãos avaliem os serviços oferecidos pela prefeitura e seus órgãos, bem como os locais públicos pertencentes ao município. O objetivo é fornecer um canal direto de comunicação entre os cidadãos e a prefeitura, permitindo que os gestores tenham um feedback mais direto e preciso sobre a qualidade dos serviços oferecidos e possam tomar ações para melhorar a experiência do usuário.

<h2 style="center" id="tecnologias">Tecnologias Utilizadas</h2>

Front-End
- HTML
- CSS
- Js

Back-End
- PHP

Banco de Dados:
- MySql

<h2 style="center" id="instruções">📖 Instruções</h2>

Para usar o sistema, basta seguir os seguintes passos:

- Acesse o sistema através do seu dispositivo desktop ou totem disponível no local.

- O sistema irá automaticamente detectar o local onde o dispositivo está localizado.

- Escolha uma nota de 1 a 5 para avaliar o local.

- Sua avaliação será registrada automaticamente.

Os usuários não têm acesso à lista de locais ou outras informações do sistema, sua única função é avaliar o local onde o dispositivo está localizado.

Os administradores do sistema podem gerenciar as informações do sistema, como locais e serviços disponíveis para avaliação, através da interface de gerenciamento disponível para a prefeitura. Eles também podem visualizar as avaliações recebidas e gerar relatórios de desempenho.

<h2 style="center" id="requisitos_sistema">💻 Requisitos do Sistema</h2>

Os requisitos de um sistema são as especificações e funcionalidades que o sistema deve ter para atender às necessidades dos usuários. Eles incluem, principalmente, requisitos funcionais e requisitos não-funcionais. Existem vários outros tipos de requisitos, o uso deles vai depender do projeto sendo trabalhado.

<h2 style="center" id="requisitos_funcionais">🛠️ Requisitos Funcionais</h2>

Requisitos funcionais são funcionalidades que um sistema precisa ter para atender às necessidades do usuário. Eles descrevem o que o sistema deve fazer e como fazer. Eles estão relacionados às tarefas do usuário e incluem telas, campos e botões. Esses requisitos são fundamentais para garantir que o sistema seja útil e atenda aos objetivos do usuário.

- Tela de avaliação com 5 opções de escolha (muito ruim, ruim, regular, bom, muito bom) e ícones correspondentes;
- Tela de agradecimento com mensagem de agradecimento e redirecionamento automático para a tela de avaliação;
- Tela de login de ADMs para acesso restrito à informações dos resultados das pesquisas;
- Tela do dashboard de resultados com tabela e filtros;
- Tela de cadastro de novos locais de avaliação com inputs para nome, endereço e site (url);
- Tela de cadastro de novos setores para avaliação com campos para nome, local referente e descrição do setor;
- Tela de cadastro de novos usuários com campos para username, senha (e confirmação da senha), email e status (define as permissões do ADM);
- Histórico de avaliações por local/setor;
- Regras de validação de dados para evitar avaliações duplicadas e outros problemas com os dados das avaliações;
- Armazenamento de dados em banco de dados (MySQL);
- Acessibilidade para usuários com necessidades especiais;
- Projeto tolerante a falhas;
- Uso das PSRs e normas do PHP The Right Way;
- Padrões nas telas para uma experiência de usuário consistente.

<h2 style="center" id="requisitos_not">🎨 Requisitos Não Funcionais</h2>

Os requisitos não-funcionais são características que um sistema deve possuir, mas que não estão diretamente relacionadas com as funcionalidades que ele oferece. Eles estão relacionados com aspectos como desempenho, segurança, usabilidade, manutenibilidade, etc. Esses requisitos são importantes para garantir que o sistema seja eficiente, seguro e fácil de usar, além de permitir que ele seja mantido e evoluído com facilidade ao longo do tempo.

- Proteção de dados e senhas, e encriptação de dados em transmissão.
- Possibilidade de integração com outras ferramentas.
- Realização periódica de backups dos dados.
- Interface intuitiva e fácil de usar, com fluxo de navegação consistente.
- Capacidade de processar e armazenar grandes quantidades de avaliações sem afetar o tempo de resposta, tempo de carregamento de páginas não deve exceder 3 segundos e transações de banco de dados devem ser realizadas em menos de 500ms.
- Um sistema sempre disponível, com inatividade planejada fora do horário de pico e inatividade não planejada não superior a 1 hora.
- Capacidade de lidar com um grande número de usuários e dados sem afetar o desempenho.
- Possibilidade de personalização da interface do usuário.
- Possibilidade de notificar os ADMs sobre novas avaliações ou erros.
- Relatórios: disponibilidade de dados para criação de relatórios e gráficos.
- Possibilidade de exportação de dados em formatos que facilitem a criação de relatórios e gráficos.
- Monitoramento contínuo do sistema para identificar problemas e anomalias, com sistema de alertas para equipe de suporte.
- Sistema altamente confiável, com tempo de inatividade planejado e comunicado com antecedência.

<h2 style="center" id="pre_requisitos">🔍 Pré Requisitos</h2>
Antes de começar, você vai precisar ter instalado em sua máquina as seguintes ferramentas: Git, Node.js e um servidor local. Além disto é bom ter um editor para trabalhar com o código como VSCode

```
# Clone este repositório
$ git clone https://github.com/Projeto-Satisfacao/Projeto_Satisfacao.git

# Acesse a pasta do projeto no seu terminal/cmd
$ cd Projeto_Satisfacao
```

<h2 style="center" id="autoria">✍️ Autoria</h2>

Turma G82893 Senai Camaçari - Ba
Técnico em Análise e Desenvolvimento de Sistemas

<h2 style="center" id="licenca">📝 Licença</h2>

Este projeto esta sob a licença GNU.
