<?php
namespace Riskio\Auth0ModuleTest\Factory;

use Auth0\SDK\Auth0Api;
use Riskio\Auth0Module\Factory\Auth0ApiFactory;
use Riskio\Auth0Module\Options\Auth0Options;
use Zend\ServiceManager\ServiceManager;

class Auth0ApiFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function createService_GivenServiceManagerThatContainsService_ShouldReturnAuth0ClientInstance()
    {
        $anyOptions = $this->getMock(Auth0Options::class);
        $serviceManager = new ServiceManager();
        $serviceManager->setService(Auth0Options::class, $anyOptions);

        $factory = new Auth0ApiFactory();

        $service = $factory($serviceManager);

        $this->assertInstanceOf(Auth0Api::class, $service);
    }
}
