<?php

include_once 'core/helper.php';
include_once 'core/request.php';
include_once 'core/router.php';

require_once 'core/myContext.php';

$router = new Router(new Request);

$router->get('/', function() {
  $content = file_get_contents(dirname(__FILE__).'/views/stage.php');
  include('views/base.page.php');
  return;
});

$router->get('/story', function() {
  $content = file_get_contents(dirname(__FILE__).'/views/story.php');
  include('views/base.page.php');
  return;
});

$router->get('/project', function() {
  $content = file_get_contents(dirname(__FILE__).'/views/project.php');
  include('views/base.page.php');
  return;
});

$router->get('/product', function() {
  $content = file_get_contents(dirname(__FILE__).'/views/product.php');
  include('views/base.page.php');
  return;
});

$router->get('/experience', function() {
  $content = file_get_contents(dirname(__FILE__).'/views/experience.php');
  include('views/base.page.php');
  return;
});

$router->get('/impact', function() {
  $content = file_get_contents(dirname(__FILE__).'/views/impact.php');
  include('views/base.page.php');
  return;
});

$router->get('/actor', function() {
  $content = file_get_contents(dirname(__FILE__).'/views/actor.php');
  include('views/base.page.php');
  return;
});

$router->get('/advisor', function() {
  $content = file_get_contents(dirname(__FILE__).'/views/advisor.php');
  include('views/base.page.php');
  return;
});

$router->get('/volunteer', function() {
  $content = file_get_contents(dirname(__FILE__).'/views/volunteer.php');
  include('views/base.page.php');
  return;
});

$router->get('/pkl', function() {
  $content = file_get_contents(dirname(__FILE__).'/views/pkl.php');
  include('views/base.page.php');
  return;
});

$router->get('/actor_detail', function() {
  $content = file_get_contents(dirname(__FILE__).'/views/actor.detail.php');
  include('views/base.page.php');
  return;
});

$router->get('/community', function() {
  $content = file_get_contents(dirname(__FILE__).'/views/community.php');
  include('views/base.page.php');
  return;
});

$router->get('/community_detail', function() {
  $content = file_get_contents(dirname(__FILE__).'/views/community.detail.php');
  include('views/base.page.php');
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

$router->get('/archive', function() {
  include('views/PARAKARSA/index.html');
  return;
});

$router->get('/blank', function() {
  $content = "<div class=\"container py-5\"><div style=\"text-align: center\"><h1>Being to show</h1></div></div>";
  include('views/base.page.php');
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
