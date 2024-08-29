# Integração de estoque de veículos

## Objetivo

O objetivo deste projeto é possibilitar a partir da importação de arquivos, um controle de estoque de veículos, de
diferentes fornecedores.

## Tecnologias

O projeto foi desenvolvido utilizando as seguintes tecnologias:

- Laravel ^11
- PHP 8.2
- MySQL 8.0
- Node 20.12
- Vite ^5
- TailwindCSS ^3
- Livewire ^3

## Instalação

Para instalar o projeto, siga os passos abaixo:

- Clone o repositório `git clone https://github.com/NicollasMatheus37/integracao-estoque-veiculos.git`
- Acesse a pasta do projeto `cd integracao-estoque-veiculos`
- Instale as dependências do PHP `composer install`
- Copie o arquivo `.env.example` para `.env` e configure o banco de dados
- Gere a chave da aplicação `php artisan key:generate`
- Execute as migrations `php artisan migrate`
- Execute o servidor `php artisan serve`
- Execute o servidor de desenvolvimento do vite `npm run dev`
- Acesse o projeto em `http://localhost:8000`

