<?php declare(strict_types=1);

namespace Stormannsgal\App;

use Stormannsgal\App\Handler\PingHandler;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => $this->getDependencies(),
        ];
    }

    public function getDependencies(): array
    {
        return [
            'invokables' => [
                PingHandler::class => PingHandler::class,
            ],
            'factories' => [

            ],
        ];
    }
}
