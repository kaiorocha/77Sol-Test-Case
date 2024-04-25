# 77Sol Case - Documentação

## Tópicos
1. [Introdução](#introdução)
2. [Entidades](#documentação)
3. [Endpoints](#requisitos-de-ambiente)
4. [Instruções de Instalação](#instalação-e-configuração)
5. [Uso do Sistema](#instalação-e-configuração)

## Introdução

O Sistema de Gerenciamento de projetos solares é um aplicação que permite aos usuários criar, visualiza, atualizar e excluir projetos e clientes. Ele oference diversos endpoints para a interação via API possibilitando a integração com sistemas externos e projetos front-end.

## Entidades

O sistema possui as seguintes entidades:

1. **Customer**: Representa um usuário registrado no sistema.
2. **Project**: Representa um projeto em andamento. Cada projeto deve possuir um cliente e um cliente pode estar vinculado a multiplos projetos.

## Endpoins da API

a API do sistema oferece os seguintes endpoints:

> **GET** /api/customers: Lista clientes cadastrados

> **POST** /api/customers: Registra um novo cliente

> **GET** /api/customers/{id}: Retorna as informações de um cliente

> **GET** /api/customers/{id}/projects: Retorna os projetos vinculados a um cliente

> **PUT** /api/customers/{id}: Edita as informações de um cliente

> **DELETE** /api/customers/{id}: Deleta um cliente

> **GET** /api/projects: Lista projetos cadastrados

> **POST** /api/projects: Registra um novo projeto

> **GET** /api/projects/{id}: Retorna as informações de um projeto

> **PUT** /api/projects/{id}: Edita as informações de um projeto

> **DELETE** /api/projects/{id}: Deleta um projeto

Após acessar subir o sistema, a documentação Swagger da API pode ser acessar em: http://localhost/api/documentation

Para gerar a documentação da API, execute o seguinte comando:

> php artisan l5-swagger:generate

A documentação também pode ser acessar no seguinte link:

> https://documenter.getpostman.com/view/185429/2sA3BrZVui

## Instruções de Instalação

**1. Melhor maneira de instalar a plataforma:**

##### Siga os passos abaixo em ordem:

~~~
1. Clone o repositório do GitHub: https://github.com/kaiorocha/77Sol-Test-Case.git
~~~

~~~
2. Renomeie o arquivo .env.example para .env
~~~

~~~
3. Execute o comando composer install para instalar as dependências do sistema.
~~~

~~~
4. Execute o comando php artisan key:generate para gerar uma chave de aplicativo.
~~~

~~~
5. Execute o comando ./vendor/bin/sail u -d para criar o ambiente docker e iniciar a aplicação.
~~~

~~~
6. Finalmente, execute o comando ./vendor/bin/sail artisan migrate para que o banco de dados seja criado.
~~~

## Uso do Sistema

Após iniciar o sail o sistema será disponibilizado, por padrão, no endereço http://localhost

Abaixo alguns outros comando para interagir com o **sail**:

Para inciar subir os serviços docker:

> ./vendor/bin/sail up

Para inciar subir os serviços docker em backgroud:

> ./vendor/bin/sail up -d

Para derrubar os serviços docker:

> ./vendor/bin/sail down

Para interagir com a serviço em execução siga o exemplo abaixo:

> ./vendor/bin/sail artisan migrate
