# API directcall Laminas

Api REST onde os usuários buscam a temperatura de uma cidade em um
certo dia, e a resposta será a temperatura do dia procurado e dos próximos 10 dias

# Clone do projeto

<p>
$ git clone https://github.com/PatricioPedro/directapi.git
$ gitcheckout api

## Instalação das dependências

$ docker-compose up -d --build
$ docker-compose run apigility composer update


# Iniciar o app
$ ./vendor/bin/laminas-development-mode enable
$ docker-compose up

### Painel Admin Laminas UI
- http://localhost:8080

### MySQLPHPMyAdmin
- http://localhost:8081

# Endpoints
A API possui 3 módulos, User, Provider, Temperature

- User

Endpoints disponivel para este modulo: 

[GET] http://localhost:8080/user/[:username]  retorna os dados de um usuario

[POST] http://localhost:8080/user cria um novo usuário


    {
      "username": "nomedousuario",
      "password": "palavrapassedousuario"
    }


- Provider

Endpoints disponivel para este modulo: 

[GET] http://localhost:8080/provider retorna a lista dos fornecedores

[POST] http://localhost:8080/provider cria um novo fornecedor

    {
      "name": "nomefornecedor"
    }
[DELETE] http://localhost:8080/provider/[:id] apaga um fornecedor do banco passando o id

[PUT] http://localhost:8080/provider/[:id] atualiza os dados de um fornecedor do banco passando o id

    {
      "name": "atualizacao"
    }

 - Temperature

Endpoints disponivel para este modulo: 

[GET] http://localhost:8080/provider retorna a lista das temperaturas

[GET] http://localhost:8080/pro?city_uf=sp&date=2022-05-20  retorna a media da tempera de uma determinada cidade
no dia data passada e nos proximos 10

[POST] http://localhost:8080/provider insere uma nova temperatura

    {
      "unit": <string unidade>, /* kelvin, celcius... */
      provider_id: <int id de um fornecedor>,       /*por exemplo 8*/
      average_temperatura: <double media da temperatura real>, /*Por exemplo 15.6*/,
      day: <date data para contem o dia para pesquisa>   /*Data no formato Y-m-d */,
      city_uf: <string uf> /*UF das cidades do Brasil por exemplo sp */)

    }

Autenticação: 

[POST] http://localhost:8080/oauth

No corpo da requisação:

{
  "grant_type": "password",
  "username": "patriciopedro", // exemplo pode criar outros usuario e autenticar por eles
  "password": "passworduser",  // exemplo
}

Config: 

No postman ou no insonmnia vai na opção auth e seleciona Basic auth

username: adminclient
password: test

Como resposta vai trazer o acesstoke daí so copiar e ir para o endpoint desejedo colar na opção Bearer Token e colar o token que as rotas já estarão disponīveis



Tecnologias usadas:

Laminas
PHP
MySQL
oauth2
Docker
Composer
<p/>