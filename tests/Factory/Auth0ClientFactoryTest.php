<?php
namespace Riskio\Auth0ModuleTest\Factory;

use Riskio\Auth0Module\Factory\Auth0ClientFactory;

class Auth0ClientFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateAuth0ClientInstance()
    {
        $optionsDummy = $this->getMock('Riskio\Auth0Module\Options\Auth0Options');

        $serviceManagerStub = $this->getMock('Zend\ServiceManager\ServiceLocatorInterface');
        $serviceManagerStub
            ->method('get')
            ->with('Riskio\Auth0Module\Options\Auth0Options')
            ->will($this->returnValue($optionsDummy));

        $factory = new Auth0ClientFactory();

        $service = $factory->createService($serviceManagerStub);
        $this->assertInstanceOf('Riskio\Auth0Module\Client\Auth0Client', $service);
    }
}
