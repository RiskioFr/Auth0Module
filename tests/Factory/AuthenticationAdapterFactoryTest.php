<?php
namespace Riskio\Auth0ModuleTest\Factory;

use Interop\Container\ContainerInterface;
use League\OAuth2\Client\Provider\ProviderInterface;
use Riskio\Authentication\Auth0\Adapter;
use Riskio\Auth0Module\Factory\AuthenticationAdapterFactory;

class AuthenticationAdapterFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function createService_GivenServiceManagerThatContainsService_ShouldReturnAdapterInstance()
    {
        $anyProvider = $this->getMock(ProviderInterface::class);
        $container = $this->prophesize(ContainerInterface::class);
        $container->get('Riskio\Auth0Module\OAuth2\Client\Provider')->willReturn($anyProvider);

        $factory = new AuthenticationAdapterFactory();

        $service = $factory($container->reveal());

        $this->assertInstanceOf(Adapter::class, $service);
    }
}
