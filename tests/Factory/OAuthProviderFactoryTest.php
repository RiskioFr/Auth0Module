<?php
namespace Riskio\Auth0ModuleTest\Factory;

use Interop\Container\ContainerInterface;
use League\OAuth2\Client\Provider\ProviderInterface;
use Riskio\Auth0Module\Factory\OAuthProviderFactory;
use Riskio\Auth0Module\Options\Auth0Options;

class OAuth0ProviderFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function createService_GivenServiceManagerThatContainsService_ShouldReturnAuth0ProviderInstance()
    {
        $options = [
            'account'       => 'foo',
            'client_id'     => 'id',
            'client_secret' => 'secret',
            'redirect_uri'  => 'http://localhost/callback.php',
        ];
        $auth0OptionsStub = $this->createMock(Auth0Options::class);
        $auth0OptionsStub
            ->method('toArray')
            ->will($this->returnValue($options));

        $container = $this->prophesize(ContainerInterface::class);
        $container->get(Auth0Options::class)->willReturn($auth0OptionsStub);

        $factory = new OAuthProviderFactory();

        $service = $factory($container->reveal());

        $this->assertInstanceOf(ProviderInterface::class, $service);
    }
}
