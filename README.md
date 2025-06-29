# 🛠️ Desafio Técnico - Sistema de Funcionários (GestorFuncionarios)

Este é um projeto desenvolvido como parte de um desafio técnico. A aplicação consiste em um sistema de gerenciamento de funcionários com funcionalidades de cadastro, listagem, edição e exclusão.

---

## ✅ Requisitos para o projeto

- PHP 8.1 ou superior
- Composer
- MySQL

---

## 📸 Demonstrações

> Abaixo algumas telas da aplicação:
### 🔑 Tela de Login
![image](https://github.com/user-attachments/assets/6c3260e9-460a-486e-b8ca-69e3e0e5ad69)

### 📋 Listagem de Funcionários
![image](https://github.com/user-attachments/assets/a4263c46-63b6-40cb-bf9a-5b15eb8b73a8)

### ➕ Cadastro de Funcionário
![image](https://github.com/user-attachments/assets/088f6e0d-f790-4be0-976b-efc7bdb34c78)

---

## 🚀 Tecnologias Utilizadas

- PHP 8+
- Laravel 10+
- MySQL
- Alpine.js - (interatividade com páginas)
- Blade (Template engine do Laravel)
- Bootstrap (para estilização)
- Composer (gerenciador de dependências)

---

## 📌 Projeto

Este projeto foi desenvolvido com foco em boas práticas de Laravel, organização de código, legibilidade e clareza. As funcionalidades básicas de CRUD estão todas implementadas de forma segura e funcional.

## 🛡️ Controle de Acesso (Admin)
Além da tabela de **Funcionarios**, o sistema possui uma tabela adicional chamada **Admin**, que representa os usuários com permissão para acessar o sistema.

- Essa tabela foi criada propositalmente para permitir autenticação via tela de login.
- Apenas usuários cadastrados como admin podem acessar o sistema e gerenciar os funcionários.
- Isso garante uma separação clara entre os dados dos funcionários e os usuários que têm acesso administrativo ao sistema.
    ```bash
    A autenticação foi implementada utilizando os recursos nativos do Laravel, com middleware de proteção às rotas.

Exemplo de fluxo:

- O admin acessa /login.
- Após autenticação bem-sucedida, ele é redirecionado para o painel de gestão.
- Dentro do painel, pode cadastrar, editar, excluir e visualizar funcionários.

Login/Senha

- Deixei como padrão o login e senha no AdminSeeder, que seria **Usuário: root / Senha: 1234**

## 🔐 Segurança

- As rotas do sistema são protegidas por middleware de autenticação (auth).
- Os IDs utilizados nas rotas são criptografados com Crypt::encrypt() para evitar manipulação direta de URLs.
- Validações de dados são aplicadas tanto no frontend quanto no backend

---

## 📦 Instalação e Execução

Siga os passos abaixo para rodar o projeto localmente:

1. **Clone o repositório:**
   ```bash
   git clone https://github.com/Luan-Kleber/GestorFuncionarios.git
   cd GestorFuncionarios
2. **Instale as dependências PHP com o Composer:**
   ```bash
   composer install
3. **Copie o arquivo '.env.example' para '.env':**
   ```bash
   cp .env.example .env
4. **Configure o arquivo .env com os dados do seu banco de dados**
   ```bach
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=db_usuarios
    DB_USERNAME=seu_username
    DB_PASSWORD=sua_senha
5. **Gere a chave da aplicação:**
   ```bash
   php artisan key:generate
6. **Execute as migrations para criar as tabelas ou pode usar querys manuais que deixei na raiz do projeto querys.sql :**
   ```bash
   php artisan migrate
7. **(Opcional) Popule o banco com dados fake:**
   ```bash
   php artisan db:seed --class=AdminSeeder
   php artisan db:seed --class=FuncionarioSeeder
8. **Inicie o servidor de desenvolvimento:**
   ```bash
   php artisan serve

## 👨‍💻 Autor
- Nome: Luan Amaral
- LinkedIn: [linkedin.com/in/luan-kleber-amaral](https://www.linkedin.com/in/luan-kleber-amaral-0b2abb187/)
- Email: luanamaral.6540@hotmail.com
