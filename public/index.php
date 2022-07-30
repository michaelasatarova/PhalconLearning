<?php 

if (!in_array('phalcon',get_loaded_extensions())) die ('Phalcon not installed!');

use Phalcon\Di\FactoryDefault;
use Phalcon\Autoload\Loader;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Application;
use Phalcon\Url;

//var_dump(get_class_methods('\Phalcon\Autoload\Loader'));
//define('BASE_PATH', dirname(__DIR__));
$_SERVER["REQUEST_URI"] = preg_replace('|^/phalcon_fix/phalcon-learning|','',$_SERVER["REQUEST_URI"]);

$loader = new Loader();
$loader->setDirectories(
    [
        '../app/controllers/',
        '../app/models/'
    ]
);
$loader->register();

$container = new FactoryDefault();

$container->set(
    'view',
    function () {
        $view = new View();
        $view->setViewsDir('../app/views');
        return $view;
    }
);

$container->set(
    'url',
    function () {
        $url = new Url();
        $url->setBaseUri('/');
        return $url;
    }
);

$application = new Application($container);

try {
    $response = $application->handle(
        $_SERVER["REQUEST_URI"]
    );
    $response->send();
} catch (\Exception $e) {
    echo 'Exception: ', $e->getMessage();
}

?>

