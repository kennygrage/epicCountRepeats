<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/RepeatCounter.php";

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
        $word = new RepeatCounter;
        $value = $word->countRepeats($_GET['sentence'], $_GET['word']);
        //I want different output on result page if it returns a count or if it returns an error.
        $value_number = 0;
        $value_string = "";

        if(is_string($value)) {$value_string = $value;}
        else {$value_number = $value;}

        //now we will pass both of those variables into the results page
        return $app['twig']->render('result.html.twig', array('value_string' => $value_string, 'value_number' => $value_number));
    });

    return $app;
?>
