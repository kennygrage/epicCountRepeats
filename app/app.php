<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/WordCount.php";

    use Symfony\Component\Debug\Debug;
    Debug::enable();

    $app = new Silex\Application();
    $app['debug'] = true;

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));



    //now for our pages
    $app->get("/", function() use ($app) {
        return $app['twig']->render('index.html.twig');
    });

    $app->get("/view_result", function() use ($app) {
        $word = new WordCount;
        $value = $word->calcSent($_GET['sentence'], $_GET['word']);
        return $app['twig']->render('result.html.twig', array('value' => $value));
    });
    
    return $app;
?>
