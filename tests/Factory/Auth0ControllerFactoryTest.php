<?php
namespace Riskio\Auth0ModuleTest\Factory;

use Riskio\Auth0Module\Factory\Auth0ControllerFactory;

class Auth0ControllerFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateInstance()
    {
        $auth0ServiceDummy = $this->getMockBuilder('Riskio\Auth0Module\Service\Auth0Service')
            ->disableOriginalConstructor()
            ->getMock();

        $serviceManagerStub = $this->getMock('Zend\ServiceManager\ServiceLocatorInterface');
        $serviceManagerStub
            ->method('get')
            ->with('Riskio\Auth0Module\Service\Auth0Service')
            ->will($this->returnValue($auth0ServiceDummy));

        $pluginManagerStub = $this->getMock('Zend\ServiceManager\AbstractPluginManager');
        $pluginManagerStub
            ->method('getServiceLocator')
            ->will($this->returnValue($serviceManagerStub));

        $factory = new Auth0ControllerFactory();

        $service = $factory->createService($pluginManagerStub);
        $this->assertInstanceOf('Riskio\Auth0Module\Controller\Auth0Controller', $service);
    }
}
