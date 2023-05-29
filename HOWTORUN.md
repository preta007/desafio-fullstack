Instalação do Backend - Laravel 10
Para instalar o backend deste programa, siga as instruções abaixo:

Requisitos
Composer
PHP = 8.2
MySQL ou outro banco de dados compatível com o Laravel 10
Git (opcional)
Passo a Passo
Faça o download do código fonte deste programa ou clone este repositório usando o Git.

git clone https://github.com/ofaelzera/desafio-fullstack.git
Abra um terminal na pasta do projeto e execute o comando composer install para instalar as dependências do Laravel.

Copie o arquivo .env.example e renomeie para .env.

cp .env.example .env
Abra o arquivo .env e edite as informações do banco de dados nas linhas que começam com DB_.

DB_CONNECTION=mysql
DB_HOST=seuhost
DB_PORT=suaporta
DB_DATABASE=nomedobanco
DB_USERNAME=userbanco
DB_PASSWORD=senhabanco

Substitua seuhost, suaporta, nomedobanco, userbanco e senhabanco pelas configurações do seu ambiente.

Execute o comando php artisan migrate para criar as tabelas no banco de dados.

Execute o comando php artisan db:seed --class="UserSeeder" para popular a tabela de usuários com alguns registros de teste.

Execute o comando php artisan jwt:secret para gerar a chave secreta usada pelo pacote JWT.

Execute o comando php artisan key:generate para gerar uma nova chave de aplicativo.

Finalmente, execute o comando php artisan serve para iniciar o servidor web na porta 8000.

php artisan serve
Pronto! O backend está instalado e pronto para ser usado pelo programa.

#######################################################################################################################

Instalação do Frontend - Vue.js 3
Para instalar o frontend deste programa, siga as instruções abaixo:

Requisitos
Node.js >= 14.x
NPM >= 6.x
Acesso ao servidor do backend
Passo a Passo
Acesse a pasta do frontend do projeto.

cd frontend
Execute o comando npm install para instalar as dependências do projeto.

Verifique se o arquivo src/services/http.js está configurado com a baseURL correspondente ao servidor do backend.

import axios from "axios";

const http = axios.create({
   baseURL: "http://seu-servidor-backend:8000/api",
   headers: {
      "Content-type": "application/json",
   },
});

export default http;

Substitua seu-servidor-backend pela URL ou IP do servidor onde o backend está sendo executado. A porta 8000 é a padrão do Laravel, mas verifique se está de acordo com o seu ambiente.

Execute o comando npm run dev para iniciar o servidor de desenvolvimento do Vue.js

npm run dev

O servidor de desenvolvimento será iniciado e você poderá acessar o frontend em http://localhost:5173.

Pronto! O frontend está instalado e pronto para se comunicar com o backend.