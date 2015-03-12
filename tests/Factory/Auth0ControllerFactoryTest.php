<?php
namespace Riskio\Auth0ModuleTest\Factory;

use Riskio\Auth0Module\Factory\Auth0ControllerFactory;

class Auth0ControllerFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateInstance()
    {
        $authServiceDummy = $this->getMockBuilder('Zend\Authentication\AuthenticationService')
            ->disableOriginalConstructor()
            ->getMock();

        $authAdapterDummy = $this->getMockBuilder('Riskio\Auth0Module\Authentication\Adapter\Auth0Adapter')
            ->disableOriginalConstructor()
            ->getMock();

        $returnValueMap = [
            ['Riskio\Auth0Module\Authentication\AuthenticationService', $authServiceDummy],
            ['Riskio\Auth0Module\Authentication\Adapter\Auth0Adapter', $authAdapterDummy],
        ];

        $serviceManagerStub = $this->getMock('Zend\ServiceManager\ServiceLocatorInterface');
        $serviceManagerStub
            ->method('get')
            ->will($this->returnValueMap($returnValueMap));

        $pluginManagerStub = $this->getMock('Zend\ServiceManager\AbstractPluginManager');
        $pluginManagerStub
            ->method('getServiceLocator')
            ->will($this->returnValue($serviceManagerStub));

        $factory = new Auth0ControllerFactory();

        $service = $factory->createService($pluginManagerStub);
        $this->assertInstanceOf('Riskio\Auth0Module\Controller\Auth0Controller', $service);
    }
}
