# Gáficos Laravel/Vue - Douglas Volcato

![Diagram of the App](diagrams\home-screen-print.png)

## Funcionalidade
A funcionalidade principal deste projeto é mostrar gráficos na página, utilizando os dados obtidos da API do governo.

## Tecnologias Utilizadas
- PHP
- Javascript
- Laravel
- Vue
- Primevue

## Como instalar e executar este projeto utilizando o Docker
1. Execute o seguinte comando para criar a imagem no Docker:
   ```
   docker build -t laravel-vue-charts .
   ```

2. Agora para executar o projeto, utilize o comando:
   ```
   docker run -p 8000:8000 laravel-vue-charts
   ```
   Deste modo o projeto será aberto no link http://localhost:8000


## Como instalar e executar este projeto sem utilizar o Docker
Para instalar este projeto, é necessário ter o Node.js, PHP e Composer atualizados. Siga os passos abaixo:

1. Execute o seguinte comando para instalar as dependências e compilar:
   ```
   composer install && npm install && run build
   ```

2. Agora para executar o projeto, use o comando abaixo:
   ```
   php artisan serve
   ```
   O link para acesso aparecerá no terminal após executar este comando - geralmente http://127.0.0.1:8000

## Desenho da aplicação
![Diagram of the App](diagrams/total-cnae-consume-charts.png)