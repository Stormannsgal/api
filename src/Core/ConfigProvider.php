<?php declare(strict_types=1);

namespace Stormannsgal\Core;

use Laminas\ServiceManager\AbstractFactory\ConfigAbstractFactory;
use Psr\Log\LoggerInterface;
use Stormannsgal\Core\Listener\LoggingErrorListener;
use Stormannsgal\Core\Listener\LoggingErrorListenerFactory;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => $this->getDependencies(),
            ConfigAbstractFactory::class => $this->getAbstractFactoryConfig(),
        ];
    }

    public function getDependencies(): array
    {
        return [
            'invokables' => [
            ],
            'aliases' => [
            ],
            'factories' => [
                LoggingErrorListener::class => LoggingErrorListenerFactory::class,
                Middleware\RouteNotFoundMiddleware::class => ConfigAbstractFactory::class,
            ],
        ];
    }

    public function getAbstractFactoryConfig(): array
    {
        return [
            Middleware\RouteNotFoundMiddleware::class => [
                LoggerInterface::class,
            ],
        ];
    }
}
