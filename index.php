<?php
require 'routes/router.php';

route('/', function() {
    echo "index!";
});

route('/exemplo1', function() {
    echo "exemplo1";
});

route('/exemplo2', function() {
    echo "Exemplo2";
});

$requestedPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

dispatch($requestedPath);
