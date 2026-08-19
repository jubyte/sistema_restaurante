# sistema_restaurante

## Como executar o projeto

### 1. Instalar o XAMPP

Instale o XAMPP no computador e abra o painel de controle. Este link para instalar: <https://www.apachefriends.org/pt_br/index.html>

### 2. Iniciar o servidor

No XAMPP, inicie:

- Apache
- MySQL

### 3. Colocar o projeto na pasta do XAMPP

Coloque a pasta do projeto dentro da pasta: `htdocs`

Normalmente, ela fica em: `C:\xampp\htdocs`

### 4. Acessar o sistema

Com o Apache e o MySQL funcionando, abra o navegador e acesse: `http://localhost/nome-da-pasta`

## Prepared Statements

As operações que recebem informações digitadas pelo usuário utilizam **Prepared Statements**. Isso ajuda a deixar as operações com o banco de dados mais seguras e evita problemas como SQL Injection.

# Requisitos Funcionais e Não Funcionais

RF1 — Cadastrar usuário: O sistema deve permitir cadastrar usuários informando nome e e-mail.

RF2 — Cadastrar Prato: O sistema deve permitir que um usuário cadastre um prato informando nome, descrição, preço e categoria.

RF3 — Listar Pratos: O sistema deve apresentar todos os pratos cadastrados, informando também o usuário responsável pelo cadastro.

RF4 — Editar Prato: O sistema deve permitir alterar as informações de um prato já cadastrado.

RF5 — Excluir Prato: O sistema deve permitir excluir um prato já cadastrado.

RF6 — Listar Pratos por Usuário: O sistema deve permitir visualizar os pratos cadastrados por um determinado usuário.

RNF1 — Validação dos Campos: O sistema não deve permitir o cadastro de usuários ou pratos com campos obrigatórios vazios.

RNF2 — Segurança dos Dados: As operações que recebem informações fornecidas pelo usuário deverão utilizar Prepared Statements.
