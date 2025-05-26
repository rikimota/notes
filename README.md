<h1 align="center">
Notes App
</h1>

## Sobre 📕

Este é um aplicativo web simples construído com Laravel para gerenciar suas notas pessoais. Ele oferece funcionalidades essenciais como autenticação de usuário, criação, edição e exclusão de notas, tudo dentro de uma interface limpa e intuitiva.

## Funcionalidades ✨

* **Autenticação de Usuário**: Funcionalidade segura de login e logout para que os usuários gerenciem suas notas de forma privada.
* **Criar Notas**: Adicione facilmente novas notas com um título e conteúdo de texto detalhado.
* **Editar Notas**: Modifique notas existentes para manter suas informações atualizadas.
* **Excluir Notas**: Remova notas que você não precisa mais, com uma etapa de confirmação para evitar exclusões acidentais.
* **Validação de Dados**: Validação de formulário robusta para garantir a integridade dos dados inseridos pelo usuário.
* **Gerenciamento de Sessão**: As sessões do usuário são tratadas para manter o estado de login.
* **Soft Deletes**: Notas são "soft deleted" (excluídas suavemente), o que significa que são marcadas como excluídas no banco de dados em vez de removidas permanentemente, permitindo uma possível recuperação.
* **Criptografia de ID**: Os IDs das notas são criptografados nas URLs para maior segurança.

## Tecnologias Utilizadas 💻

* **Laravel**: Um poderoso framework de aplicação web PHP que oferece sintaxe elegante e recursos robustos para o desenvolvimento rápido de aplicações.
* **PHP**: A linguagem de programação principal usada para a lógica de backend.
* **MySQL (ou SQLite)**: O aplicativo é configurado para usar um banco de dados para armazenar informações de usuários e notas. A conexão padrão é SQLite, mas pode ser facilmente configurada para MySQL ou outros bancos de dados.
* **Blade Templating Engine**: O poderoso, simples e bonito motor de template do Laravel, usado para as views da aplicação.
* **Bootstrap**: Um popular framework CSS para desenvolver sites responsivos e mobile-first. Usado para estilizar a interface do usuário da aplicação.
* **Font Awesome**: Uma biblioteca de ícones amplamente utilizada que fornece ícones vetoriais escaláveis que podem ser personalizados com CSS.
* **Composer**: Gerenciador de dependências para PHP, usado para gerenciar as bibliotecas e dependências do projeto.
* **Vite**: Uma ferramenta de build de frontend rápida usada para compilação de ativos.
* **Tailwind CSS**: Um framework CSS utilitário-first (importado via Vite, embora o Bootstrap seja usado principalmente para estilização).

## Instalação e Configuração 🛠️

Para ter uma cópia deste projeto funcionando em sua máquina local para fins de desenvolvimento e teste, siga estas etapas:

1.  **Clone o repositório:**
    ```bash
    git clone <repository_url>
    cd notes
    ```

2.  **Instale as dependências PHP:**
    ```bash
    composer install
    ```

3.  **Instale as dependências JavaScript:**
    ```bash
    npm install
    ```

4.  **Copie o arquivo de ambiente:**
    ```bash
    cp .env.example .env
    ```

5.  **Gere uma chave de aplicação:**
    ```bash
    php artisan key:generate
    ```

6.  **Execute as migrações e seeders do banco de dados:**
    ```bash
    php artisan migrate --seed
    ```
    (Isso criará as tabelas `users` e `notes` necessárias e preencherá alguns dados de usuário iniciais.)

7.  **Inicie o servidor de desenvolvimento:**
    ```bash
    npm run dev
    ```
    ou
    ```bash
    php artisan serve
    ```

8.  **Acesse o aplicativo:**
    Abra seu navegador e navegue para `http://localhost:8000` (ou a URL fornecida por `php artisan serve`).

Uso 🚀

1.  **Login**: Acesse a página de login em `/login`. Use as credenciais pré-definidas (por exemplo, `user1@gmail.com` com a senha `abc123456`) para fazer login.
2.  **Visualizar Notas**: Após fazer login, você será redirecionado para a página inicial, onde poderá ver todas as suas notas.
3.  **Criar Nova Nota**: Clique no botão "New Note" para adicionar uma nova nota.
4.  **Editar Nota**: Na página inicial, clique no ícone de edição ao lado de uma nota para modificar seu título e conteúdo.
5.  **Excluir Nota**: Clique no ícone de exclusão ao lado de uma nota. Você será solicitado a confirmar a exclusão.

## Estrutura do Projeto 📂

* `app/Http/Controllers/`: Contém os controladores da aplicação, manipulando requisições de usuários e a lógica para autenticação e gerenciamento de notas.
* `app/Models/`: Define os modelos Eloquent para `User` e `Note`, representando as tabelas do banco de dados e seus relacionamentos.
* `app/Http/Middleware/`: Contém middlewares personalizados para verificar o status de autenticação do usuário.
* `app/Services/Operations.php`: Contém uma classe utilitária para operações comuns, como descriptografia de IDs.
* `database/migrations/`: Definições de esquema de banco de dados para as tabelas `users` e `notes`.
* `database/seeders/`: Seeders para popular o banco de dados com dados iniciais (por exemplo, usuários de teste).
* `resources/views/`: Templates Blade para a interface do usuário da aplicação.
* `routes/web.php`: Define as rotas web para a aplicação, incluindo rotas protegidas que exigem autenticação.

## Contribuição 🤝

Contribuições são bem-vindas! Se você tiver sugestões de melhorias ou novas funcionalidades, sinta-se à vontade para abrir uma [issue](https://github.com/rikimota/notes/issues) ou enviar um [pull request](https://github.com/rikimota/notes/pulls).
