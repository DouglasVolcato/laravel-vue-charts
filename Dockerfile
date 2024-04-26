# Imagem base
FROM php:8.3.6

# Instalação do Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    composer --version

# Instalação do Node.js e npm
RUN curl -sL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs && \
    npm --version && \
    node --version

# Instalação do git
RUN apt-get update && \
    apt-get install -y git

# Diretório de trabalho
WORKDIR /var/www/html

# Copiando os arquivos do diretório atual para o contêiner
COPY . .

# Instalação das dependências do Composer e do npm
RUN composer install && \
    npm install && \
    npm run build

# Expondo a porta 8000
EXPOSE 8000

# Comando para rodar a aplicação
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
