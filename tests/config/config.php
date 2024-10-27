<?php declare(strict_types=1);

use Laminas\ConfigAggregator\ConfigAggregator;
use Mezzio\ConfigProvider as MezzioConfig;
use Mezzio\Router\ConfigProvider as RouterConfig;
use Mezzio\Router\FastRouteRouter\ConfigProvider as FastRouteConfig;
use Trinet\MezzioTest\TestConfigProvider;
use Stormannsgal\Core\ConfigProvider;

$providers = [
    FastRouteConfig::class,
    MezzioConfig::class,
    RouterConfig::class,
    \Stormannsgal\App\ConfigProvider::class,
    ConfigProvider::class,
];

$providers = array_merge($providers, TestConfigProvider::load(__DIR__ . '/autoload/'));

$aggregator = new ConfigAggregator($providers, null, []);
return $aggregator->getMergedConfig();
