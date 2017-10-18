# Recrutamento Mindtec
Projeto para utilização no recrutamento e seleção.

#### Instruções

* Faça commits por cada tarefa realizada e, ao final, envie o link do seu repositório para vaga.mindtec@gmail.com.br;
* Utilize o banco de dados conforme instruções;

#### Tabelas

* Crie as tabelas de acordo com o diagrama relacional ![ ](https://github.com/mindtec2014/RecrutamentoMindtec/blob/master/instrucoes/banco-de-dados.png);
* Clientes: IdCliente - Chave Primária, RazaoSocial - Texto, DataCadastro - Data, BolAtivo - 1 ou 0;
* ContatosClientes: IdContato - Chave Primária, IdCliente - Chave Estrangeira, TipoContato - Texto (Exemplo: Email, Telefone, Celular), DescContato - Texto (Exemplo: tiago@gmail.com, (27)9999-8888, etc), BolAtivo - 1 ou 0;


#### As seguintes funcionalidades deverão ser criadas:

* Listagem, Cadastro, Edição e Exclusão (lógica) de Cliente;
* Listagem, Cadastro, Edição e Exclusão (lógica) de Contatos de um Cliente.

#### Restrições do Projeto

* O projeto deverá rodar nas versões mais recentes dos principais navegadores do mercado (Firefox, Chrome, EDGE);
* O projeto deve utilizar Bootstrap 3;
* A linguagem utilizada deve ser PHP na versão 7.x;
* O banco de dados será Mysql (instruções por email);
* O projeto deverá ser feito utilizando POO. Caso utilize um framework, recomedamos o Codeigniter 3;
* Pelo menos 1 requisição deverá ser feita utilizando Ajax;

#### Pontuação do Teste
Consideraremos para este teste:

* Pontualidade na entrega;
* Organização da estrutura e legibilidade;
* Quantidade de bugs e a gravidade de cada um;
* Utilização da Orientação a Objeto;
* Maior número de funcionalidades entregues.
