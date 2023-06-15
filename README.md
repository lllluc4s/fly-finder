# API RESTful com PHP 8.1/Laravel 10 - FlyFinder

Esta é uma API RESTful desenvolvida em PHP 8.1 e Laravel 10 que fornece e recebe informações de um banco de dados MySQL. A API é segura e usa autenticação JWT para autenticar solicitações de usuários.

## Instalação

1. Clone o repositório para o seu computador.
2. Execute o comando `composer install` para instalar as dependências do Laravel.
3. Crie um arquivo `.env` na raiz do projeto e configure-o com suas credenciais de banco de dados e configurações JWT.
4. Execute o comando `php artisan migrate:fresh --seed` para criar as tabelas do banco de dados.

## Endpoints

### Listar todos os registros da tabela

Endpoint: `GET /api/companhias-aereas`

Este endpoint retorna todas as informações de todos os registros da tabela.

### Buscar informações de um registro específico

Endpoint: `GET /api/companhias-aereas/{id}`

Este endpoint retorna as informações do registro com o ID fornecido.

### Criar um novo registro

Endpoint: `POST /api/companhias-aereas/`

Este endpoint cria um novo registro na tabela. Os dados do registro devem ser fornecidos no corpo da solicitação.

### Atualizar um registro existente

Endpoint: `PUT /api/companhias-aereas/{id}`

Este endpoint atualiza um registro existente na tabela. Os dados do registro devem ser fornecidos no corpo da solicitação.

### Excluir um registro

Endpoint: `DELETE /api/companhias-aereas/{id}`

Este endpoint exclui um registro existente da tabela.

### Testes de integração

Os endpoints foram testados usando PHPUnit e um arquivo `tests/Feature/CompanyFeatureTest.php` foi criado para testar os endpoints.

Para executar os testes, execute o comando `php artisan test`.

## Autenticação JWT

A API usa autenticação JWT para autenticar solicitações de usuários. Para obter um token JWT válido, envie uma solicitação de autenticação para o endpoint `POST /api/auth/login`, fornecendo um nome de usuário e senha válidos. O endpoint retornará um token JWT que pode ser usado para autenticar solicitações subsequentes.

Publique as configurações do pacote jwt-auth usando o comando:

```
php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
```

Gere uma chave secreta para o JWT usando o comando:

```
php artisan jwt:secret
```

Para enviar o token JWT com uma solicitação, inclua o token no cabeçalho de autorização da solicitação:

```
Authorization: Bearer {token}
```

Você pode gerar um token JWT pela rota `POST /api/auth/login` enviando um JSON no corpo da requisição com o seguinte formato:

```
{
    "email": "admin@admin.com",
    "password": "admin"
}
```

## Respostas JSON

A API retorna respostas JSON em todas as solicitações. Os dados são retornados no formato:

```

{
"data": [],
"links": {},
"meta": {}
}

```

Onde `data` contém os dados solicitados, `links` contém links para páginas adicionais (se houver), e `meta` contém informações adicionais sobre a solicitação (como o número total de registros encontrado).

## Documentação da API

A documentação da API foi criada usando o Swagger. Para acessar a documentação, execute a API e navegue para `http://localhost:8000/api/documentacao`. A documentação inclui informações sobre todos os endpoints disponíveis, bem como exemplos de solicitações e respostas.
