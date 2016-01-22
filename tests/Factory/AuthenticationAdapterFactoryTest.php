<?php
namespace Riskio\Auth0ModuleTest\Factory;

use League\OAuth2\Client\Provider\ProviderInterface;
use Riskio\Authentication\Auth0\Adapter;
use Riskio\Auth0Module\Factory\AuthenticationAdapterFactory;
use Zend\ServiceManager\ServiceManager;

class AuthenticationAdapterFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function createService_GivenServiceManagerThatContainsService_ShouldReturnAdapterInstance()
    {
        $anyProvider = $this->getMock(ProviderInterface::class);
        $serviceManager = new ServiceManager();
        $serviceManager->setService('Riskio\Auth0Module\OAuth2\Client\Provider', $anyProvider);

        $factory = new AuthenticationAdapterFactory();

        $service = $factory($serviceManager);

        $this->assertInstanceOf(Adapter::class, $service);
    }
}
