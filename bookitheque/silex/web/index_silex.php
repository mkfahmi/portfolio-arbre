<?php

include(__DIR__.'/../../includes/php/europeana.php');
include(__DIR__.'/../../includes/php/opendataparis.php');
//include(__DIR__.'/../../includes/php/amazon.php');

require_once __DIR__.'/../vendor/autoload.php';
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\HttpFoundation\Response;

$app = new Silex\Application();

$app->before(function (Request $request) {
    if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
        $data = json_decode($request->getContent(), true);
        $request->request->replace(is_array($data) ? $data : array());
    }
});

$app->get('/', function () {
    return 'Hello world';
});

$app->post('/search', function (Request $request) use ($app) {
    $post = array(
        'source' => $request->request->get('source'),
        'title' => $request->request->get('title'),
        'author' => $request->request->get('author'),
        'publisher' => $request->request->get('publisher'),
        'year' => $request->request->get('year'),
        'language' => $request->request->get('language'),
    );
    
    $func = 'search_'.$post["source"];
    $return = $func($post);
    
    return $app->json($return, 201);
});

$app->run();