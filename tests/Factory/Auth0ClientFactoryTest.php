<?php
namespace Riskio\Auth0ModuleTest\Factory;

use Riskio\Auth0Module\Factory\Auth0ClientFactory;

class Auth0ClientFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateInstance()
    {
        $auth0SdkDummy = $this->getMockBuilder('Auth0SDK\Auth0')
            ->disableOriginalConstructor()
            ->getMock();

        $serviceManagerStub = $this->getMock('Zend\ServiceManager\ServiceLocatorInterface');
        $serviceManagerStub
            ->method('get')
            ->with('Riskio\Auth0Module\Auth0Sdk')
            ->will($this->returnValue($auth0SdkDummy));

        $factory = new Auth0ClientFactory();

        $service = $factory->createService($serviceManagerStub);
        $this->assertInstanceOf('Riskio\Auth0Module\Client\Auth0Client', $service);
    }
}
