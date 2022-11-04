## DC Sistema de vendas  ########

Projeto desenvolvido no framework Laravel na versão 8 


## Requisitos

# Instalar no computador as seguintes tecnologias 


```bash
- Composer 
- PHP 7.4
- MYSQL
- NPM (A versão mais recente)
```

Acessar o arquivo php.ini e ativar as extensões abaixo

```bash
extension=curl
extension=mbstring
extension=intl
extension=pdo_mysql
extension=pdo_sqlite
extension=openssl
```

## Configuração

1- Rode o seguinte comando na pasta raiz da aplicação:
```bash
composer install
```

2- Executar o seguinte comando no banco MYSQL  
```bash
create database dc_sistema_vendas;
```

3- Criar as tabelas usando o comando abaixo
```bash
php artisan migrate
```

4- Configurar o banco de dados no arquivo .env 


5- Rodar os comando NPM para instalar os assets do ADMIN 

```bash
npm install 

npm run dev 
```

OBS: Rodar um por vez os comando do NPM


5  Por fim, rode no `PowerShell` o seguinte comando para acessar o projeto 

```bash
php artisan serve
```
