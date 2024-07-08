<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Locadora-Veicular

Esse projeto trata-se de uma API responsável por criar, editar, listar e deletar informações do usuário e informações de carros.
<br><br>
A API conta com as seguintes caractetisticas:
- Autenticação
- Arquitetura Hexagonal
- Driven Domain Design
- Princípios SOLID
- Testes Automatizados
<br>

## Collection Postman
Utilize o link abaixo para acessar a Collection do Postman
<br>[Postman-Collection-Locadora-Veicular](https://elements.getpostman.com/redirect?entityId=24702725-d04e8cf3-aa55-4d99-bcb8-3c46c56bb91b&entityType=collection)
<br>
<br>

## Comandos

Abaixo estão listados os principais comandos para subir o ambiente da aplicação.
<br>

### Clone do Repositório

#### 1) Para clonar o repositório, basta utilizar o comando abaixo em um diretório preferido:
```
git clone git@github.com:brunojose13/Locadora-Veicular.git
```

#### 2) Entre no diretório do projeto:
```
cd Locadora-Veicular
```

### Estruturar Ambiente

#### 1) Utilize o exemplo do env para criar o arquivo .env:
```
cp .env.example .env
```

#### 2) Configure as variáveis de ambiente do banco de dados no arquivo .env:
```
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_EXPOSED_PORT=3307
DB_DATABASE=locadora_veicular
DB_DATABASE_TEST=test_locadora_veicular
DB_USERNAME=root
DB_PASSWORD=root
```
Observação: Caso você queira utilizar o PHP já instalado em sua máquina:
<br>→ Comente a variável DB_HOST
<br>→ Comente a variável DB_PORT
<br>
<br>

#### 3) Construa as imagens docker e inicialize seus respectivos containers:
```
docker-compose up -d
```
Observação para Windows: Lembre-se de deixar seu aplicativo Docker Desktop em execução
<br>
<br>

#### 4) Instale as dependências do laravel e gere uma nova chave de aplicação:
```
docker exec php composer install && docker exec php php artisan key:generate
```
Observação: só utilize esses comandos ao configurar pela primeira vez
<br>
<br>

#### 5) Utilize o comando abaixo para executar as migrations do laravel:
```
docker-compose exec app php artisan migrate
```

#### 6) Abra o terminal do MySQL e insira a senha definida para o root:
```
docker exec -it mysql mysql -u root -p
```
Observação: A senha estará localizada no arquivo .env, na variável DB_PASSWORD
<br>
<br>

#### 7) Execute a query abaixo:
```
CREATE DATABASE test_locadora_veicular;
```
Observação: Para sair do terminal MySQL, aperte Ctrl + Z
<br>
<br>

#### 8) Para executar os testes automatizados da aplicação, utilize o seguinte comando:
```
docker-compose exec app php artisan test
```

### Comandos PHP/Artisan

#### 1) Para executar algum comando utilizando o container PHP, utilize o seguinte comando:
```
docker exec php php
```
ou
```
docker-compose exec app php
```

#### 2) Execute o comando abaixo para iniciar o servidor artisan:
```
docker-compose exec app php artisan serve --host=0.0.0.0 --port=8000
```

#### 3) Para popular o banco, utilize os semeadores:
```
docker-compose exec app php artisan db:seed
```

### Resolução de Problemas (Artisan)

#### 1) Caso o funcionamento do servidor artisan ser interrompido ou o mesmo estiver desligado, execute os comandos abaixo para garantir o uso da porta 8000, na qual está informada dentro do arquivo docker-compose.yml
```
docker-compose stop && docker-compose up -d && docker restart php && docker-compose exec app php artisan serve --host=0.0.0.0 --port=8000
```

#### 2) Caso estiver enfrentando o problema a seguir:
```
Illuminate\Database\QueryException 

  SQLSTATE[HY000] [2002] No such file or directory (Connection: mysql, SQL: select table_name as name, (data_length + index_length) as size, table_comment as comment, engine as engine, table_collation as collation from information_schema.tables where table_schema = 'database_rental' and table_type in ('BASE TABLE', 'SYSTEM VERSIONED') order by table_name)

  at vendor/laravel/framework/src/Illuminate/Database/Connection.php:829
    825▕                     $this->getName(), $query, $this->prepareBindings($bindings), $e
    826▕                 );
    827▕             }
    828▕ 
  ➜ 829▕             throw new QueryException(
    830▕                 $this->getName(), $query, $this->prepareBindings($bindings), $e
    831▕             );
    832▕         }
    833▕     }

      +39 vendor frames

  40  artisan:35
      Illuminate\Foundation\Console\Kernel::handle(Object(Symfony\Component\Console\Input\ArgvInput), Object(Symfony\Component\Console\Output\ConsoleOutput))
```
Utilize o comando abaixo para garantir que as configurações atuais não esteja utilizando o cache:
```
docker-compose exec app php artisan config:clear
```
