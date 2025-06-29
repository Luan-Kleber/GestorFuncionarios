# 🛠️ Desafio Técnico - Sistema de Funcionários (GestorFuncionarios)

Este é um projeto desenvolvido como parte de um desafio técnico. A aplicação consiste em um sistema de gerenciamento de funcionários com funcionalidades de cadastro, listagem, edição e exclusão.

## 📸 Demonstrações

> Abaixo algumas telas da aplicação:
### Tela de Login
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

## 📦 Instalação e Execução

Siga os passos abaixo para rodar o projeto localmente:

1. **Clone o repositório:**
   ```bash
   git clone https://github.com/seuusuario/seu-repositorio.git
   cd seu-repositorio
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
6. **Execute as migrations para criar as tabelas:**
   ```bash
   php artisan migrate
7. **(Opcional) Popule o banco com dados fake ou pode usar querys manuais que deixei na raiz do projeto querys.sql :**
   ```bash
   php artisan db:seed
8. **Inicie o servidor de desenvolvimento:**
   ```bash
   php artisan serve
