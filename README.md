# Controle de Séries em Laravel

Bem-vindo ao Controle de Séries em Laravel! Esta aplicação permite que você organize suas séries, temporadas e episódios, facilitando o acompanhamento do que você assistiu.

## Requisitos

Certifique-se de ter os seguintes requisitos instalados antes de começar:

- PHP 8.1.2 
- Composer
- Laravel
- SQLite
- Bootstrap

## Instalação

Siga estas etapas para configurar e iniciar o projeto:

1. **Clonando o repositório:**

   Clone o repositório para o seu ambiente local:

   ```bash
   git clone https://github.com/Antonio-pf/series-controle.git

2. **Acesse a pasta do projeto:**

Navegue até a pasta do projeto:

 ```bash
cd controle_series
```

3. **Instalando Dependências:**

Instale as dependências do Composer:
 
```bash
composer install
```

4. **Configuração do Ambiente:**

Copie o arquivo .env.example para .env:

```bash
cp .env.example .env
```
5. Configuração do Banco de Dados:

Configure o arquivo .env com suas configurações de banco de dados. Para usar SQLite, atualize a configuração da seguinte forma:



```bash
env

DB_CONNECTION=sqlite

```

6. Chave de Aplicação:

Gere uma chave de aplicação:

```bash

php artisan key:generate
```

7. Migrações do Banco de Dados:

Execute as migrações para criar o banco de dados:

```bash
php artisan migrate
```

8. Iniciando o Servidor:

Inicie o servidor de desenvolvimento:

```bash
php artisan serve
```
Agora você pode acessar a aplicação em http://localhost:8000 no seu navegador.

## Funcionalidades

- [X]  Login e Registro
- [x]  Adicionar Séries
- [x]  Marcar Episódios como Vistos: 4
- [x]  Remover Séries, Temporadas e Episódios:
- [x]  Adicionar Temporadas e Episódios:
- [x]  Remover botão de sair após logado
- [x]  Não exibir botão entrar no forms de login
- [x] Confirmação de senha
- [x] Verificação usuários
- [x] Envio de email após criar série
- [ ] Validar envio de imagem - back
