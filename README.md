## Teste Tecnico

Esta aplicação foi concebida usando o framework de PHP [Laravel](https://laravel.com/). Ela usa o pacote Laravel Sail que ajuda muito na gestão dos Containers Docker. Estamos a usar o Banco de dados PostgreSql.
A aplicação tem 2 Containers:
    
- `Sail-8.1/app`
- `postgres:14`


---

 - ### [Como rodar](#como-rodar-o-projecto)




 ## Como rodar o projecto

Para rodar o Projecto voçe precisa de ter o Docker instalado na sua maquina.

Abra o seu terminal e faça um clone do projecto:

    $ git clone https://github.com/TilsonM17/nyx-teste-Tecnico.git

Depois, entre na pasta do projecto e execute o container do docker.

    $ cd nyx-teste-Tecnico
    ~/nyx-teste-Tecnico/ $  docker-compose -f docker-compose.yml up 

Agora verifique se os containers levantaram:
    
    $ docker ps

Se a resposta for similar a esta que esta na imagem, podemos avançar para o proximo passo.

![Imagem do terminal](./resources/img/terminal.png)

Na imagem mostra que o nosso container esta a rodar, copie o CONTAINER ID, vamos entrar dentro do container `sail-8.1/app`, depois instale as dependencias do projecto e execute o seguinte.

    $ docker exec -it e7c9570281c9 bash 

    // De permissão a pasta storage
    $ chmod -R 777 storage

    //Instalar as dependencias
    $ composer install

    Copiar o arquivo .env
    $ cp .env.example .env

     //Gerar a chave da aplicação
    $ php artisan key:generate




![Imagem da instalação](./resources/img/2.png)

    // Parar todos containers
    $ docker stop $(docker ps -a -q)

    //Executar os containers
    $ ./vendor/bin/sail up 


Pode acessar o [localhost](http://localhost).