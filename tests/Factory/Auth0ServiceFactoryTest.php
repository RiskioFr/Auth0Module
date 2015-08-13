<?php
namespace Riskio\Auth0ModuleTest\Factory;

use Riskio\Auth0Module\Factory\Auth0ServiceFactory;
use Riskio\Auth0Module\Service\Auth0Service;
use Zend\Authentication\AuthenticationServiceInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class Auth0ServiceFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function createService_GivenServiceManagerThatContainsService_ShouldReturnAuth0ServiceInstance()
    {
        $authServiceDummy = $this->getMock(AuthenticationServiceInterface::class);

        $returnValueMap = [
            ['Riskio\AuthenticationModule\AuthenticationService', $authServiceDummy],
        ];

        $serviceManagerStub = $this->getMock(ServiceLocatorInterface::class);
        $serviceManagerStub
            ->method('get')
            ->will($this->returnValueMap($returnValueMap));

        $factory = new Auth0ServiceFactory();

        $service = $factory->createService($serviceManagerStub);
        $this->assertInstanceOf(Auth0Service::class, $service);
    }
}
