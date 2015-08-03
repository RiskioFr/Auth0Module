<?php
namespace Riskio\Auth0ModuleTest\Factory;

use Riskio\Auth0Module\Factory\Auth0OptionsFactory;
use Riskio\Auth0Module\Options\Auth0Options;
use Zend\ServiceManager\ServiceLocatorInterface;

class Auth0OptionsFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function createService_GivenServiceManagerThatContainsService_ShouldReturnAuth0OptionsInstance()
    {
        $config = [
            'auth0' => [],
        ];

        $serviceManagerStub = $this->getMock(ServiceLocatorInterface::class);
        $serviceManagerStub
            ->method('get')
            ->with('Config')
            ->will($this->returnValue($config));

        $factory = new Auth0OptionsFactory();

        $service = $factory->createService($serviceManagerStub);

        $this->assertInstanceOf(Auth0Options::class, $service);
    }
}
