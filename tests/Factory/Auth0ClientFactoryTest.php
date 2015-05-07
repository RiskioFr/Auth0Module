<?php
namespace Riskio\Auth0ModuleTest\Factory;

use Riskio\Auth0Sdk\Client\Auth0Client;
use Riskio\Auth0Module\Factory\Auth0ClientFactory;
use Riskio\Auth0Module\Options\Auth0Options;
use Zend\ServiceManager\ServiceLocatorInterface;

class Auth0ClientFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function createService_GivenServiceManagerThatContainsService_ShouldReturnAuth0ClientInstance()
    {
        $anyOptions = $this->getMock(Auth0Options::class);

        $serviceManagerStub = $this->getMock(ServiceLocatorInterface::class);
        $serviceManagerStub
            ->method('get')
            ->with(Auth0Options::class)
            ->will($this->returnValue($anyOptions));

        $factory = new Auth0ClientFactory();

        $service = $factory->createService($serviceManagerStub);

        $this->assertInstanceOf(Auth0Client::class, $service);
    }
}
