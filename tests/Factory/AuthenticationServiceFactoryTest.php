<?php
namespace Riskio\Auth0ModuleTest\Factory;

use Riskio\Auth0Module\Factory\AuthenticationServiceFactory;

class AuthenticationServiceFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateInstance()
    {
        $authAdapterDummy = $this->getMockBuilder('Riskio\Auth0Module\Authentication\Adapter\Auth0Adapter')
            ->disableOriginalConstructor()
            ->getMock();

        $returnValueMap = [
            ['Riskio\Auth0Module\Authentication\Adapter\Auth0Adapter', $authAdapterDummy],
        ];

        $serviceManagerStub = $this->getMock('Zend\ServiceManager\ServiceLocatorInterface');
        $serviceManagerStub
            ->method('get')
            ->will($this->returnValueMap($returnValueMap));

        $factory = new AuthenticationServiceFactory();

        $service = $factory->createService($serviceManagerStub);
        $this->assertInstanceOf('Zend\Authentication\AuthenticationService', $service);
    }
}
