<?php
namespace Riskio\Auth0ModuleTest\Factory;

use Riskio\Auth0Module\Factory\Auth0OptionsFactory;

class Auth0OptionsFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateInstance()
    {
        $config = [
            'auth0' => [],
        ];

        $serviceManagerStub = $this->getMock('Zend\ServiceManager\ServiceLocatorInterface');
        $serviceManagerStub
            ->method('get')
            ->with('Config')
            ->will($this->returnValue($config));

        $factory = new Auth0OptionsFactory();

        $service = $factory->createService($serviceManagerStub);
        $this->assertInstanceOf('Riskio\Auth0Module\Options\Auth0Options', $service);
    }
}
