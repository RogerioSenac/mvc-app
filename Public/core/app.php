<?php 
class App {
    // Definir controlador e método padrão
    protected $controller = 'UserController';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        // Obtém a URL e a transforma em um array
        $url = $this->parseUrl();

               // Requisição do arquivo Controlador caso ele exista
        require_once '../app/Controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // Verificar se o controlador existe no diretório de controladores
        if (isset($url[0]) && file_exists('../app/Controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
            require_once '../app/Controllers/' . $this->controller . '.php';
            $this->controller = new $this->controller;
            
        }

        // Verifica se existe um método (ação) no controlador a ser chamado
        if (isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }

        // Define os parâmetros restantes como parâmetros para o método
        $this->params = $url ? array_values($url) : [];

        // Chama o método do controlador com os parâmetros
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    // Função para quebrar a URL em partes (controlador, método e parâmetros)
    public function parseURL() {
        if (isset($_GET['url'])) {
            // Remove barras extras e sanitiza a URL
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
        return []; // Retorna um array vazio se não houver URL
    }
}
?>
