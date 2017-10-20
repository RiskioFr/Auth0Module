<?php
namespace Riskio\Auth0ModuleTest\Factory;

use Interop\Container\ContainerInterface;
use League\OAuth2\Client\Provider\AbstractProvider;
use PHPUnit\Framework\TestCase;
use Riskio\Authentication\Auth0\Adapter;
use Riskio\Auth0Module\Factory\AuthenticationAdapterFactory;

class AuthenticationAdapterFactoryTest extends TestCase
{
    /**
     * @test
     */
    public function createService_GivenServiceManagerThatContainsService_ShouldReturnAdapterInstance()
    {
        $anyProvider = $this->createMock(AbstractProvider::class);
        $container = $this->prophesize(ContainerInterface::class);
        $container->get('Riskio\Auth0Module\OAuth2\Client\Provider')->willReturn($anyProvider);

        $factory = new AuthenticationAdapterFactory();

        $service = $factory($container->reveal());

        $this->assertInstanceOf(Adapter::class, $service);
    }
}
