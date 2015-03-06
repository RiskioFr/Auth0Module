<?php
namespace Riskio\Auth0ModuleTest\Factory;

use Riskio\Auth0Module\Factory\Auth0SdkFactory;

class Auth0SdkFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateInstance()
    {
        $config = [
            'auth0' => [
                'domain'        => 'foo.auth0.com',
                'client_id'     => 'id',
                'client_secret' => 'secret',
                'redirect_uri'  => 'http://localhost/callback.php',
                'store'         => false,
            ],
        ];

        $serviceManagerStub = $this->getMock('Zend\ServiceManager\ServiceLocatorInterface');
        $serviceManagerStub
            ->method('get')
            ->with('Config')
            ->will($this->returnValue($config));

        $factory = new Auth0SdkFactory();

        $service = $factory->createService($serviceManagerStub);
        $this->assertInstanceOf('Auth0SDK\Auth0', $service);
    }
}
