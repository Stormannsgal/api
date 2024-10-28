<?php declare(strict_types=1);

use Mezzio\Application;
use Stormannsgal\App\Handler\PingHandler;

return static function (Application $app): void {
    $app->get('/api/ping[/]', PingHandler::class, PingHandler::class);
};
