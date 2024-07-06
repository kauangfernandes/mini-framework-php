<h2>Introdução<h2>

<p>
    O Mini Framework é um framework PHP leve e básico que facilita o desenvolvimento de aplicações web. 
    Inspirado em Padrões de Projetos como POO (Programação Orientada a Objetos) e MVC (Model-View-Controller), 
    o framework oferece uma estrutura organizada e flexível para construir seus projetos com eficiência.
</p>

<h2>Objetivo(s)</h2>

<p>
    Este projeto teve como princípio o desenvolvimento de uma estrutura básica para a criação de outras aplicações.
</p>


Funcionalidades

Autoloader: Carregamento de classes automático, sem necessidade de importação manual.
Rotas: Definição de qual controller deve ser instanciado e qual função deve ser acessada.
Htaccess: Redirecionamento e reescrita de URL, configurando o APACHE no projeto. Permite o redirecionamento de qualquer URL para o arquivo index.php.
Reutilização de layout: Criação de um layout padrão para as views, evitando reescrever o mesmo código várias vezes.
MVC: Arquitetura Model-View-Controller para organização e separação de responsabilidades.
POO/OO: Paradigma de Programação Orientada a Objetos para reutilização de código e flexibilidade.
PDO: Data Access Object para acesso a bancos de dados de forma segura e eficiente.
Singleton: Padrão de projeto para garantir que apenas uma instância de uma classe seja criada.
Como usar

Adicionando uma rota:

Para adicionar uma nova rota no seu projeto, siga estes passos:

Acesse o arquivo routes.class.php dentro da pasta rotes.
Localize a função initRoutes().
Adicione sua nova rota utilizando a sintaxe a seguir:
PHP
<code>$this->getHttp("/rota", [NomeDoController::class, "nomeDaFuncao"]);</code>

Use o código com cuidado.
content_copy
Exemplo:

PHP
<code>$this->getHttp("/rota", [NomeDoController::class, "nomeDaFuncao"]);</code><br>
<code>$this->getHttp("/login", [ExemploController::class, "login"]);</code><br>
<code>$this->postHttp("/validar_login", [ExemploController::class, "autenticar"]);</code><br>

Use o código com cuidado.
content_copy
Observações:

Métodos HTTP suportados: GET e POST.
Nome do Controller: Utilize o nome completo da classe do controller, incluindo namespace (se houver).
Nome da Função: Utilize o nome exato da função que você deseja chamar dentro do controller.
Adicionando um novo controller e renderizando o conteúdo:

Para criar um novo controller que tenha a capacidade de renderizar o conteúdo, siga estes passos:

Crie um novo arquivo PHP dentro da pasta controllers com o nome do seu controller (ex: ExemploController.php).
Declare a classe do seu controller, extendendo a classe base ViewController:
PHP

<code>
    class ExemploController extends ViewController{
        // ...
    }
</code>

Use o código com cuidado.
content_copy
Implemente as funções do seu controller que serão responsáveis por processar as requisições e retornar o conteúdo a ser renderizado.
Para renderizar o conteúdo na view, utilize o método render():

PHP
<code>$this->render('nomeDaView', ['dados' => $seusDados]);</code>

Use o código com cuidado.
content_copy
Exemplo:

PHP
<code>
    class ExemploController extends ViewController{
        public function login()
        {
            // Processa a requisição de login
            // ...

            $dados['titulo'] = "Página de Login";
            $dados['mensagem'] = "Bem-vindo ao Mini Framework!";

            $this->render('login', $dados);
        }
    }
</code>

Use o código com cuidado.
content_copy
Observações:

Nome da View: Utilize o nome do arquivo da view sem a extensão .php (ex: login).
Dados: Os dados a serem passados para a view podem ser informados como um array associativo.
