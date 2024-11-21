<?php
// Array que armazenará as rotas
$routes = [];

// Função para definir rotas simples (estáticas)
function route($path, $callback) {
    global $routes;
    $routes[] = ['path' => $path, 'callback' => $callback, 'is_dynamic' => false];
}

// Função para definir rotas com parâmetros dinâmicos (usando expressões regulares)
function route_with_param($path, $callback) {
    global $routes;
    $routes[] = ['path' => $path, 'callback' => $callback, 'is_dynamic' => true];
}

// Função para despachar a rota solicitada
function dispatch($requestedPath) {
    echo "Requisitado: $requestedPath<br>";
    global $routes;

    // Verifica se a rota solicitada é estática (exata)
    foreach ($routes as $route) {
        if (!$route['is_dynamic'] && $route['path'] == $requestedPath) {
            call_user_func($route['callback']);
            return;
        }
    }

    // Verifica se a rota solicitada corresponde a uma rota dinâmica usando expressão regular
    foreach ($routes as $route) {
        if ($route['is_dynamic']) {
            // Ajustar o padrão para remover barras extras e garantir que o caminho seja tratado corretamente
            $pattern = "#^" . $route['path'] . "$#";
            if (preg_match($pattern, $requestedPath, $matches)) {
                array_shift($matches); // Remove a URL completa da lista de parâmetros
                call_user_func_array($route['callback'], $matches); // Passa os parâmetros para o callback
                return;
            }
        }
    }

    // Caso não encontre a rota
    http_response_code(404);
    echo "404 - Página não encontrada!";
}
?>
