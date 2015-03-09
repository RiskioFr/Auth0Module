<?php
namespace Riskio\Auth0ModuleTest\Factory;

use Riskio\Auth0Module\Factory\Auth0SdkFactory;

class Auth0SdkFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateInstance()
    {
        $options = [
            'domain'        => 'foo.auth0.com',
            'client_id'     => 'id',
            'client_secret' => 'secret',
            'redirect_uri'  => 'http://localhost/callback.php',
            'store'         => false,
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

        $factory = new Auth0SdkFactory();

        $service = $factory->createService($serviceManagerStub);
        $this->assertInstanceOf('Auth0SDK\Auth0', $service);
    }
}
