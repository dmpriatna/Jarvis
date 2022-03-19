<?php

include_once 'core/helper.php';
include_once 'core/request.php';
include_once 'core/router.php';

$router = new Router(new Request);

$router->get('/', function() {
  return include('views/PARAKARSA/index.html');
});

$router->get('/kartanesia', function() {
  return include('views/KARTANESIA/index.html');
});

$router->get('/natar', function() {
  return include('views/NATAR/index.html');
});

$router->get('/temuRancang', function() {
  return include('views/TEMURANCANG/index.html');
});

$router->get('/api/test', function() {
  return <<<HTML
    <h1>Hai, kamu berhasil..!</h1>
  HTML;
});

$router->post('/api/test', function($request) {
  return <<<HTML
    <h1>Hai, kamu berhasil..!</h1>
  HTML;
});
