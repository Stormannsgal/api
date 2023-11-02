<?php declare(strict_types=1);

// Delegate static file requests back to the PHP built-in webserver
use Mezzio\Application;
use Mezzio\MiddlewareFactory;
use Psr\Container\ContainerInterface;

if (PHP_SAPI === 'cli-server' && $_SERVER['SCRIPT_FILENAME'] !== __FILE__) {
    return false;
}
date_default_timezone_set('Europe/Berlin');

require_once __DIR__ . '/../../constants.php';

require ROOT_DIR . 'vendor/autoload.php';

/**
 * Self-called anonymous function that creates its own scope and keeps the global namespace clean.
 */
(function () {
    /** @var ContainerInterface $container */
    $container = require CONFIG_DIR . 'container.php';

    /** @var Application $app */
    $app = $container->get(Application::class);
    $factory = $container->get(MiddlewareFactory::class);

    // Execute programmatic/declarative middleware pipeline and routing
    // configuration statements
    (require CONFIG_DIR . 'pipeline.php')($app, $factory, $container);
    (require CONFIG_DIR . 'routes.php')($app, $factory, $container);

    $app->run();
})();
