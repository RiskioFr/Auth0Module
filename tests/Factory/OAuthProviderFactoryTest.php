<?php
namespace Riskio\Auth0ModuleTest\Factory;

use League\OAuth2\Client\Provider\ProviderInterface;
use Riskio\Auth0Module\Factory\OAuthProviderFactory;
use Riskio\Auth0Module\Options\Auth0Options;
use Zend\ServiceManager\ServiceManager;

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
        $auth0OptionsStub = $this->getMock(Auth0Options::class);
        $auth0OptionsStub
            ->method('toArray')
            ->will($this->returnValue($options));

        $serviceManager = new ServiceManager();
        $serviceManager->setService(Auth0Options::class, $auth0OptionsStub);

        $factory = new OAuthProviderFactory();

        $service = $factory($serviceManager);

        $this->assertInstanceOf(ProviderInterface::class, $service);
    }
}
