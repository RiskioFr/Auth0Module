<?php
namespace Riskio\Auth0ModuleTest\Factory;

use Psr\Container\ContainerInterface;
use PHPUnit\Framework\TestCase;
use Riskio\Auth0Module\Factory\Auth0OptionsFactory;
use Riskio\Auth0Module\Options\Auth0Options;

class Auth0OptionsFactoryTest extends TestCase
{
    /**
     * @test
     */
    public function createService_GivenServiceManagerThatContainsService_ShouldReturnAuth0OptionsInstance()
    {
        $config = ['auth0' => [
            'account' => 'foo',
            'token' => 'bar',
            'client_id' => 'id',
            'client_secret' => 'secret',
            'redirect_uri' => 'http://localhost/callback.php',
        ]];

        $container = $this->prophesize(ContainerInterface::class);
        $container->get('config')->willReturn($config);

        $factory = new Auth0OptionsFactory();

        $service = $factory($container->reveal());

        $this->assertInstanceOf(Auth0Options::class, $service);
    }
}
