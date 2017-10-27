<?php
namespace Riskio\Auth0ModuleTest\Factory;

use Psr\Container\ContainerInterface;
use PHPUnit\Framework\TestCase;
use Riskio\Authentication\Auth0\Adapter as Auth0AuthenticationAdapter;
use Riskio\Auth0Module\Factory\AuthenticationAdapterFactory;
use Riskio\OAuth2\Client\Provider\Auth0 as OAuthProvider;

class AuthenticationAdapterFactoryTest extends TestCase
{
    /**
     * @test
     */
    public function createService_GivenServiceManagerThatContainsService_ShouldReturnAdapterInstance()
    {
        $anyProvider = $this->createMock(OAuthProvider::class);
        $container = $this->prophesize(ContainerInterface::class);
        $container->get(OAuthProvider::class)->willReturn($anyProvider);

        $factory = new AuthenticationAdapterFactory();

        $service = $factory($container->reveal());

        $this->assertInstanceOf(Auth0AuthenticationAdapter::class, $service);
    }
}
