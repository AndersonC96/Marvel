# Marvel Characters Search

Este projeto utiliza a API da Marvel para buscar e exibir dados sobre personagens da Marvel Comics. É possível pesquisar por nome, ordenar por ordem alfabética ou por ordem de criação, e filtrar por quadrinhos em que o personagem aparece.

## Tecnologias utilizadas

- PHP
- HTML
- CSS
- JavaScript

## Como utilizar

Para utilizar o projeto, é necessário ter uma chave de API da Marvel. É possível obter uma chave gratuitamente no [site de desenvolvedores da Marvel](https://developer.marvel.com/).

Após obter a chave de API, é necessário criar um arquivo `.env` na raiz do projeto com as seguintes variáveis de ambiente:

MARVEL_API_PUBLIC_KEY=Sua chave pública da API da Marvel
MARVEL_API_PRIVATE_KEY=Sua chave privada da API da Marvel

Após configurar as variáveis de ambiente, é possível executar o projeto em um servidor web com suporte a PHP, como o Apache. Basta clonar o repositório, navegar até a pasta raiz do projeto e executar o comando `php -S localhost:8000` para iniciar um servidor PHP local na porta 8000.

## Funcionalidades

- Pesquisa de personagens por nome
- Ordenação de resultados por ordem alfabética ou por ordem de criação
- Filtragem de resultados por quadrinhos em que o personagem aparece

## Exemplo de uso

Para pesquisar por personagens que aparecem nos quadrinhos "Avengers", basta digitar "Avengers" no campo de busca e clicar no botão "Pesquisar". Os resultados serão exibidos abaixo, e é possível ordená-los por ordem alfabética ou por ordem de criação, utilizando os botões de ordenação.
