<?php

include_once 'core/helper.php';
include_once 'core/request.php';
include_once 'core/router.php';

require_once 'core/myContext.php';

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

$router->get('/preview', function() {
  return include('views/PROFILE/index.html');
});

$router->get('/api/test', function() {
  return <<<HTML
    <h1>Hai, kamu berhasil..!</h1>
  HTML;
});

$router->post('/api/test', function($request) {
  return json_encode($request->Body());
});

$router->post('/api/saveUser', function($request) {
  $entity = new UserEntity();
  return $entity->Save($request->Body());
});
