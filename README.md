# Projeto de Teste Técnico

Este projeto tem como objetivo, tentar cumprir os requisitos pedidos em um teste para uma vaga de programador em Laravel (PHP).

Foi pedido o desenvolvimento de um aplicativo de gerenciamento de Tarefas utilizando o Framework Laravel e o banco de Dados MySQL.

## Requerimentos

1. Configuração do projeto:
    - Criar novo projeto Laravel;
    - Configurar arquivo .env com conexão banco de dados MySQL.
    - Utilizar migrations para criação das tabelas.
2. Sistema de autenticação:
    - cadastro, login, logout.
3. CRUD de tarefas:
    - listar todas as tarefas do usuário autenticado;
    - criar uma nova tarefa;
    - editar uma tarefa existente;
    - excluir uma tarefa;
    - alterar status de uma tarefa.
4. Entidades a ser utilizadas:
    - Tarefa: id, título, descrição, status e usuário_id;
    - Relacionamento: 
        - Uma tarefa pertence a um usuário;
        - Um usuário pode ter muitas tarefas.
5. Validação e Segurança:
    - Validar os inputs dos formulários tanto de criação como edição (validate);
    - Usuários só podem acessar e/ou alterar suas próprias tarefas.
6. Interface:
    - Criar páginas utilizando Blade:
        - Tela de listagem de tarefas;
        - Formulário para criar uma nova tarefa;
        - Formulário para editar uma tarefa.
    - Exibir mensagens de sucesso e/ou erro;
7. Extra (diferencial):
    - Implementar a busca de tarefas por título;
    - Paginação da lista de tarefas;
    - Filtro por status da tarefa;
    - Página para um administrador ver as tarefas de todos os usuários;

## Tecnologias 

As tecnologias e versões que utilizei para este teste são as seguintes:
- Laravel 9.0
- PHP 8.0
- MySQL 8.0
- Bootstrasp 4.6 (via CDN link)

## Meus resultados

De todos os pedidos feitos para este projeto, somente duas funcionalidades não foram implementadas ainda, que fazem parte da seção de extras:
- Busca de tarefas pelo título.
- Filtro por status da tarefa.

## Instruções para testar o projeto

Para testar este repositório siga os seguintes passos:

1. Clone o repositório;
2. Vá na pasta onde o repositório foi clonado;
3. Utilize o seguinte comando para instalar as dependências do projeto;
    ```
    composer install
    ``` 
4. Crie o arquivo `.env` e coloque as variáveis de ambiente como no exemplo (`.env.example`) para a sua conexão do banco de dados MySQL, da sua máquina;
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

Observação: Para criar um usuário que tenha privilégio de administrador, crie seu registro dentro do banco de dados onde o valor do atributo `isAdmin` tem que ser `true`.