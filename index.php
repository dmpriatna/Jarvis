<?php

include_once 'core/helper.php';
include_once 'core/request.php';
include_once 'core/router.php';

require_once 'core/myContext.php';

$router = new Router(new Request);

$router->get('/', function() {
  include('views/PARAKARSA/index.html');
  return;
});

$router->get('/kartanesia', function() {
  include('views/KARTANESIA/index.html');
  return;
});

$router->get('/natar', function() {
  include('views/NATAR/index.html');
  return;
});

$router->get('/temuRancang', function() {
  include('views/TEMURANCANG/index.html');
  return;
});

$router->get('/preview', function() {
  include('views/PROFILE/index.html');
  return;
});

$router->get('/more', function() {
  include('views/CORSO/index.html');
  return;
});

$router->get('/break', function() {
  include('views/DEFAULT/soon.html');
  return;
});

$router->get('/api', function() {
  return <<<HTML
    <h1>Are you lost..?</h1>
  HTML;
});

$router->post('/api', function($request) {
  return json_encode($request->Body());
});

$router->post('/api/saveUser', function($request) {
  $entity = new UserEntity();
  return $entity->Save($request->Body());
});
