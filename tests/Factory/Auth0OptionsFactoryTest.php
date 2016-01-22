<?php
namespace Riskio\Auth0ModuleTest\Factory;

use Riskio\Auth0Module\Factory\Auth0OptionsFactory;
use Riskio\Auth0Module\Options\Auth0Options;
use Zend\ServiceManager\ServiceManager;

class Auth0OptionsFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function createService_GivenServiceManagerThatContainsService_ShouldReturnAuth0OptionsInstance()
    {
        $serviceManager = new ServiceManager();
        $serviceManager->setService('config', ['auth0' => []]);

        $factory = new Auth0OptionsFactory();

        $service = $factory($serviceManager);

        $this->assertInstanceOf(Auth0Options::class, $service);
    }
}
