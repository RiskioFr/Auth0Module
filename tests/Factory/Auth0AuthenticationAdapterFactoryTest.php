<?php
namespace Riskio\Auth0ModuleTest\Factory;

use Riskio\Auth0Module\Factory\Auth0AuthenticationAdapterFactory;

class Auth0AuthenticationAdapterFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateInstance()
    {
        $oauthClientProviderDummy = $this->getMockBuilder('League\OAuth2\Client\Provider\ProviderInterface')
            ->disableOriginalConstructor()
            ->getMock();

        $returnValueMap = [
            ['Riskio\Auth0Module\OAuth2\Client\Provider', $oauthClientProviderDummy],
        ];

        $serviceManagerStub = $this->getMock('Zend\ServiceManager\ServiceLocatorInterface');
        $serviceManagerStub
            ->method('get')
            ->will($this->returnValueMap($returnValueMap));

        $factory = new Auth0AuthenticationAdapterFactory();

        $service = $factory->createService($serviceManagerStub);
        $this->assertInstanceOf('Riskio\Auth0Module\Authentication\Adapter\Auth0Adapter', $service);
    }
}
