<?php
namespace TheCodingMachine\Yaco\ServiceProvider\Fixtures;

use Interop\Container\ContainerInterface;
use Interop\Container\ServiceProvider;

class TestServiceProvider implements ServiceProvider
{
    public static function getServices()
    {
        return [
            'serviceA' => 'createServiceA',
            'serviceB' => 'createServiceB'
        ];
    }

    public static function createServiceA(ContainerInterface $container)
    {
        $instance = new \stdClass();
        $instance->serviceB = $container->get('serviceB');
        return $instance;
    }

    public static function createServiceB(ContainerInterface $container)
    {
        $instance = new \stdClass();
        // Test getting the database_host parameter.
        $instance->parameter = $container->get('my_parameter');
        return $instance;
    }
}
