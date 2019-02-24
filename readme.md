## Sistema de Gerenciamento de Projetos

Anhanguera - 2º Semestre 2018

Trabalho solicitado pelo docente Vanderlei Ienne, da disciplina de Projeto Integrado V - Desenvolvimento de Sistemas, para fins de avaliação do 5º semestre do ano de 2018, no curso de  Análise e Desenvolvimento de Sistemas.

Usuários já cadastrados para login:
pedro.almeida@sgp.com.br
guilherme.paula@sgp.com.br
eduardo.silva@sgp.com.br

Senha de todos:
123456

### Requisitos: *
- Web server (Apache2 ou Nginx)
- PHP >= 7.2
- Dependências para PHP:
  - php-openssl
  - php-pdo
  - php-mbstring
  - php-tokenizer
  - php-xml
  - php-ctype
  - php-json
  - php=bcmath
  - php-curl
  - php-intl
  - php-zip

- MySQL >= 5.7 ou MariaDB >= 10.2
- Um servidor dedicado decente. Não tente executar isso em algum servidor de baixa qualidade!


### Como instalar:

Abra o Terminal na pasta do projeto e digite:
```sh
$ composer install
$ cp .env.example .env
$ php artisan key:generate
```

Edite o arquivo .env
- DB_CONNECTION=`mysql nesse caso o usado é mysql mesmo`
- DB_HOST=`127.0.0.1 servidor`
- DB_PORT=`3306 porta`
- DB_DATABASE=`database que está usando`
- DB_USERNAME=`seu usuario`
- DB_PASSWORD=`sua senha ou deixe em branco caso não use`

No Terminal novamente digite:
```sh
$ php artisan migrate "para migrar as tabelas"
$ php artisan db:seed "para inserir os primeiros dados nas tabelas"
```
Para rodar em máquina local, no Terminal digite:
```sh
$ php artisan serve "para rodar como localhost:8000"
```


### Index
![Index](https://raw.githubusercontent.com/joaorik/projeto/master/images/index.png)
### Home
![Home](https://raw.githubusercontent.com/joaorik/projeto/master/images/home.png)
### Orçamentos
![Orcamentos](https://raw.githubusercontent.com/joaorik/projeto/master/images/orcamentos.png)
### Projetos
![Projetos](https://raw.githubusercontent.com/joaorik/projeto/master/images/projetos.png)
### Projeto Detalhes
![Projeto Detalhes](https://raw.githubusercontent.com/joaorik/projeto/master/images/projeto_detalhes.png)
### Projeto MIFS
![Projeto MIFS](https://raw.githubusercontent.com/joaorik/projeto/master/images/projeto_mifs.png)
### Apontamentos
![Apontamentos](https://raw.githubusercontent.com/joaorik/projeto/master/images/apontamentos.png)
### Usuarios
![Usuarios](https://raw.githubusercontent.com/joaorik/projeto/master/images/usuarios.png)
