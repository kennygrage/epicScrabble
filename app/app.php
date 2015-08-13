<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/ScrabbleCalc.php";

    use Symfony\Component\Debug\Debug;
    Debug::enable();

    $app = new Silex\Application();
    $app['debug'] = true;

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {
        return $app['twig']->render('index.html.twig');
    });

    $app->get("/view_results", function() use ($app) {
        $scrabble = new ScrabbleCalc;
        $value = $scrabble->calcValue($_GET['word']);

        return $app['twig']->render('result.html.twig', array('value' => $value));
    });

    return $app;
?>
