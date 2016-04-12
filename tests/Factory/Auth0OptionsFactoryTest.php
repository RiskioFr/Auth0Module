<?php
namespace Riskio\Auth0ModuleTest\Factory;

use Interop\Container\ContainerInterface;
use Riskio\Auth0Module\Factory\Auth0OptionsFactory;
use Riskio\Auth0Module\Options\Auth0Options;

class Auth0OptionsFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function createService_GivenServiceManagerThatContainsService_ShouldReturnAuth0OptionsInstance()
    {
        $container = $this->prophesize(ContainerInterface::class);
        $container->get('config')->willReturn(['auth0' => []]);

        $factory = new Auth0OptionsFactory();

        $service = $factory($container->reveal());

        $this->assertInstanceOf(Auth0Options::class, $service);
    }
}
