<?php
namespace Riskio\Auth0ModuleTest\Factory;

use Riskio\Auth0Module\Factory\OAuthProviderFactory;

class OAuth0ProviderFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateOAuthClientProviderInstance()
    {
        $options = [
            'account'       => 'foo',
            'client_id'     => 'id',
            'client_secret' => 'secret',
            'redirect_uri'  => 'http://localhost/callback.php',
        ];
        $auth0OptionsStub = $this->getMock('Riskio\Auth0Module\Options\Auth0Options');
        $auth0OptionsStub
            ->method('toArray')
            ->will($this->returnValue($options));

        $serviceManagerStub = $this->getMock('Zend\ServiceManager\ServiceLocatorInterface');
        $serviceManagerStub
            ->method('get')
            ->with('Riskio\Auth0Module\Options\Auth0Options')
            ->will($this->returnValue($auth0OptionsStub));

        $factory = new OAuthProviderFactory();

        $service = $factory->createService($serviceManagerStub);
        $this->assertInstanceOf('League\OAuth2\Client\Provider\ProviderInterface', $service);
    }
}
