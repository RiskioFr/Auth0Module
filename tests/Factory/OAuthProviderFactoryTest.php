<?php
namespace Riskio\Auth0ModuleTest\Factory;

use Interop\Container\ContainerInterface;
use League\OAuth2\Client\Provider\AbstractProvider;
use PHPUnit\Framework\TestCase;
use Riskio\Auth0Module\Factory\OAuthProviderFactory;
use Riskio\Auth0Module\Options\Auth0Options;

class OAuth0ProviderFactoryTest extends TestCase
{
    /**
     * @test
     */
    public function createService_GivenServiceManagerThatContainsService_ShouldReturnAuth0ProviderInstance()
    {
        $auth0Options = new Auth0Options([
            'account' => 'foo',
            'client_id' => 'id',
            'client_secret' => 'secret',
            'redirect_uri' => 'http://localhost/callback.php',
        ]);

        $container = $this->prophesize(ContainerInterface::class);
        $container->get(Auth0Options::class)->willReturn($auth0Options);

        $factory = new OAuthProviderFactory();

        $service = $factory($container->reveal());

        $this->assertInstanceOf(AbstractProvider::class, $service);
    }
}
