<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Sobre o backend IP4y

O backend da aplicação foi desenvolvida utilizando o framework Laravel. Entre Lumen vs Laravel acabei optando por Laravel, visto que ele acaba sendo mais completo do que o próprio Lumen, que contém consigo uma porcentagem das features que o Laravel possui. Para o banco de dados eu optei por usar o MyQSL, um banco SQL que neste caso é mais do que suficiente para a dimensão do projeto. 

Para fazer a ligação da API com o <a href="https://github.com/GuilhermeFerreiraa/ip4y-test" target="_blank">front-end da aplicação</a> que foi desenvolvida utilizando React Native obtive alguns problemas com a conexão. Utilizo o emulador do Bluestacks, que devido a ser um emulador para games é mais otimizado e mais leve do que o Android Studio ou Genymotion. Devido a diferença de IP e configurações de portas do emulador usado, optei por utilizar um túnel utilizando o NGROK para poder consumir os dados no front-end.


## Setup do projeto

```shell
$ git clone https://github.com/GuilhermeFerreiraa/ip4y-backend.git
```
E então acesse o diretório
```shell
$ cd ip4y-backend
```
Após clonar o repositório, acesse o diretório da raiz do projeto e execute o comando:

```shell
$ composer install
```
Crie um arquivo `.env` na raiz do projeto com base no `.env.example` e configure as variáveis de ambiente do projeto. Próximo passo agora é gerar a chave de criptografia da aplicação, pode fazer isso utilizando o comando:
```shell
$ php artisan key:generate
```
Próximo passo agora é configurar o banco de dados do projeto com base no arquivo `.env`, incluindo `DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME e DB_PASSWORD.
Execute as migrações do banco de dados para criar as tabelas necessárias, pode fazer isso utilizando o comando:
```shell
$ php artisan migrate
```
Agora basta iniciar o servidor que irá rodar na porta: `http://127.0.0.1:8000`
