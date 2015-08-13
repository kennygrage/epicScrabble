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
        $value_number = 0;
        $value_string = "";

        if(is_string($value)) {$value_string = $value;}
        else {$value_number = $value;}

        return $app['twig']->render('result.html.twig', array('value_string' => $value_string, 'value_number' => $value_number));
    });

    return $app;
?>
