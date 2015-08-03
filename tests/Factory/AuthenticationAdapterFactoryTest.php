<?php
namespace Riskio\Auth0ModuleTest\Factory;

use League\OAuth2\Client\Provider\ProviderInterface;
use Riskio\Auth0Module\Authentication\Adapter\Auth0Adapter;
use Riskio\Auth0Module\Factory\AuthenticationAdapterFactory;
use Zend\ServiceManager\ServiceLocatorInterface;

class AuthenticationAdapterFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function createService_GivenServiceManagerThatContainsService_ShouldReturnAdapterInstance()
    {
        $anyProvider = $this->getMock(ProviderInterface::class);
        $serviceManagerStub = $this->getConfiguredServiceManager([
            ['Riskio\Auth0Module\OAuth2\Client\Provider', $anyProvider],
        ]);

        $factory = new AuthenticationAdapterFactory();

        $service = $factory->createService($serviceManagerStub);

        $this->assertInstanceOf(Auth0Adapter::class, $service);
    }

    private function getConfiguredServiceManager(array $returnValueMap)
    {
        $serviceManagerStub = $this->getMock(ServiceLocatorInterface::class);
        $serviceManagerStub
            ->method('get')
            ->will($this->returnValueMap($returnValueMap));

        return $serviceManagerStub;
    }
}
