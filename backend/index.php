<?php
require 'vendor/autoload.php';

Flight::before('start', function(&$params, &$output){
    header('Access-Control-Allow-Origin: https://lionfish-app-vc4vk.ondigitalocean.app');
    header('Access-Control-Allow-Origin: https://dolphin-app-m354a.ondigitalocean.app/');
    header('Access-Control-Allow-Methods: HEAD, GET, POST, PUT, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Request, Origin, Content-Type, Authorization, X-Requested-With, Accept');
    header('Access-Control-Allow-Credentials: true');
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
        // header('HTTP/1.1 204 No Content');
        // header('Content-Length: 0');
        exit(0);
    }
});


require 'rest/routes/middleware_routes.php';
require 'rest/routes/order_routes.php';
require 'rest/routes/product_routes.php';
require 'rest/routes/auth_routes.php';
require 'rest/routes/user_routes.php';
require 'rest/routes/cart_routes.php';


Flight::start();