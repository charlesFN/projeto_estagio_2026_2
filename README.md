# AgendaPet

Sistema de agendamento online para petshops e clínicas veterinárias, desenvolvido em Laravel. A aplicação permite que clientes solicitem serviços para seus pets de forma simples e rápida, enquanto a equipe administrativa gerencia todos os agendamentos em uma área restrita.

---

## 🌟 Funcionalidades

### 🐶 Para o Cliente

- **Formulário de Agendamento Simples:**
    - Preenchimento do nome completo do tutor e e-mail.
    - Informações do pet (Nome do animal e tipo: **Cachorro** ou **Gato**).
    - Escolha do serviço desejado:
        - 🩺 **Consulta**
        - 💉 **Vacinação**
        - 🧼 **Banho**
        - ✂️ **Banho e Tosa**
    - Seleção da data desejada para o atendimento.
    - Observações quando necessárias.

### 🛡️ Para o Administrador

- **Painel Administrativo:** Visualização organizada de todos os agendamentos realizados pelos clientes.
- **Autenticação Segura:** Sistema de Login para restrição de acesso ao painel (desenvolvido com Laravel Breeze).

### 🎨 Design & Usabilidade

- **Interface Responsiva:** Visual adaptável para computadores, tablets e celulares utilizando Bootstrap.

---

## 🚀 Tecnologias Utilizadas

Este projeto foi desenvolvido utilizando as seguintes tecnologias:

- **[PHP v8.3](https://www.php.net/)** — Linguagem de programação backend
- **[Composer v2.10.3](https://getcomposer.org/)** (Gerenciador de dependências do PHP)
- **[Laravel 13](https://laravel.com/)** (Framework PHP)
- **[Laravel Breeze v2.4](https://laravel.com/docs/starter-kits#laravel-breeze)** — Starter kit para estrutura de autenticação
- **[Laragon v8.7.0 - Full](https://laragon.org/)** (Ambiente de desenvolvimento local recomendado)
- **[MySQL](https://www.mysql.com/)** (Banco de Dados)
- **[Bootstrap v5.3.3](https://getbootstrap.com/)** (Framework CSS para o visual e componentes do Frontend)
- **[Node.js v24.20.0](https://nodejs.org/) & NPM** (Para compilação de assets com Vite)

---

## 📋 Pré-requisitos

Antes de começar, certifique-se de ter instalado em sua máquina:

- [Git](https://git-scm.com/)
- [Node.js](https://nodejs.org/) (Versão LTS recomendada)
- [Laragon](https://laragon.org/download/) _(Recomendado, pois já vem acompanhado do PHP, MySQL e Apache/Nginx)_

> 💡 **Nota sobre o Laragon:** Abra o Laragon e clique em **"Start All"** para iniciar os serviços do Apache/Nginx e do MySQL antes de rodar o projeto. Além disso, pode ser que apareça uma tela solicitando uma licença, mas basta clicar em **"Close"** que funcionará normalmente.
> Também é necessário adicionar o Laragon às **"Variáveis de Ambiente"**.
> Clique com o botão direito na tela do Laragon -> Ferramentas -> Variáveis
> de ambiente no PATH -> Add Laragon to PATH. Após isso reinicie o PC.

- [Composer v2.10.3](https://getcomposer.org/)

---

## 🔧 Instalação e Configuração

Siga o passo a passo abaixo para rodar a aplicação no seu ambiente local:

### 1. Clonar o repositório

Abra o Git Bash em C:\laragon\www e clone o repositório.

```bash
https://github.com/charlesFN/projeto_estagio_2026_2.git
```

### 2. Acessar a pasta do projeto

```
cd projeto_estagio_2026_2
```

### 3. Instalar as dependências do PHP (Composer)

```
composer install
```

### 4. Instalar as dependências do Frontend (Node.js & Bootstrap)

```
npm install
```

### 5. Configurar o arquivo de ambiente(.env)

Faça uma cópia do arquivo `.env.example` e renomie-o para `.env`:

```
cp .env.example .env
```

### 6. Configurar o Banco de Dados (MySQL)

#### 1. Abra a ferramenta de banco de dados do Laragon (clicando no botão Database para abrir o HeidiSQL).

#### 2. Crie um novo banco de dados com o nome da sua preferência (ex: agendapet).

#### 3. Abra o arquivo `.env` na raiz do projeto e ajuste as credenciais de banco de dados conforme abaixo (padrão do Laragon):

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_seu_banco
DB_USERNAME=root
DB_PASSWORD=
```

_(Certifique-se de remover a linha `DB_CONNECTION=sqlite` ou substituí-la por `mysql` se necessário)._

### 7. Gerar chave da aplicação

```
php artisan key:generate
```

### 8. Executar as Migrations do Banco de Dados

Este comando criará todas as tabelas necessárias no seu banco MySQL, incluindo as tabelas de autenticação do Breeze:

```
php artisan migrate --seed
```

_(O --seed é importante pois com ele será criado o usuário administrador)._

---

## ⚡ Executando o Projeto

Para visualizar a aplicação funcionando, você precisará rodar o servidor backend e o compilador frontend. Para isso, você deve primeiramente abrir a pasta raiz do projeto no seu editor de código.

### 1. Compilar os assets (CSS/Bootstrap/JS):

No terminal do editor de código, execute:

```
npm run dev
```

_(Mantenha esse terminal aberto enquanto estiver desenvolvendo/testando)._

### 2. Iniciar o servidor local do Laravel:

Abra uma nova aba/janela do terminal e rode:

```
php artisan serve
```

Acesse a aplicação no seu navegador através do endereço:

👉 http://localhost:8000

> 💡 **Acessando o painel do administrador:** O painel do administrador pode ser acessado através da rota http://localhost:8000/login utilizando o **E-mail** `admin@gmail.com` e **Senha** `123456`.
