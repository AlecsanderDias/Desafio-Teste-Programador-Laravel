# Projeto de Teste Técnico

Este projeto tem como objetivo, tentar cumprir os requisitos pedidos em um teste para uma vaga de programador em Laravel (PHP).

Foi pedido o desenvolvimento de um aplicativo de gerenciamento de Tarefas utilizando o Framework Laravel e o banco de Dados MySQL.

As tecnologias e versões que utilizei para este teste são as seguintes:
- Laravel 9.0
- PHP 8.0
- MySQL 8.0 

De todos os pedidos feitos para este projeto, somente duas funcionalidades não foram implementadas, que fazem parte da seção de extras:
- Busca de tarefas pelo título.
- Filtro por status da tarefa.

Para testar este repositório siga os seguintes passos:

1. Clone o repositório;
2. Vá na pasta onde o repositório foi clonado;
3. Utilize o seguinte comando para instalar as dependências do projeto;
    ```
    composer install
    ``` 
4. Crie o arquivo .env e coloque as variáveis de ambiente como no exemplo (.env.example) para a sua conexão do banco de dados MySQL, da sua máquina;
5. Utilizar o comando, para criar a chave do app
    ```
    php artisan key:generate
    ```
6. Agora utilize o seguinte comando para rodar as migrations (criar as tabelas no banco de dados);
    ```
    php artisan migrate
    ``` 
7. Enfim rodar o último comando para iniciar o projeto.
    ```
    php artisan serve
    ```

Observação: Para criar um usuário que tenha privilégio de administrador, crie seu registro dentro do banco de dados.