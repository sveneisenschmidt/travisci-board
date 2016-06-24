<?php

$filename = __DIR__.preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
if (php_sapi_name() === 'cli-server' && is_file($filename)) {
    return false;
}

require_once __DIR__.'/../vendor/autoload.php';

// Get configuration from environment
$feeds = (array)explode(',', getenv('TRAVISCI_FEEDS'));

$app = new Silex\Application();
$app->register(new Silex\Provider\TwigServiceProvider(), ['twig.path' => __DIR__.'/../views']);

$app->get('/', function() use($app) {
    return $app['twig']->render('index.html.twig');
});

$app->get('/feeds.json', function() use($app, $feeds) {
    foreach($feeds as $index => $feed) { yield $index; }
});
$app->get('/feeds/{index}.json', function() use($app) {
    return "hello";
});

$app->run();
