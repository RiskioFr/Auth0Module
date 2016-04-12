<?php
namespace Riskio\Auth0ModuleTest\Factory;

use Auth0\SDK\Auth0Api;
use Interop\Container\ContainerInterface;
use Riskio\Auth0Module\Factory\Auth0ApiFactory;
use Riskio\Auth0Module\Options\Auth0Options;

class Auth0ApiFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function createService_GivenServiceManagerThatContainsService_ShouldReturnAuth0ClientInstance()
    {
        $anyOptions = $this->getMock(Auth0Options::class);
        $container = $this->prophesize(ContainerInterface::class);
        $container->get(Auth0Options::class)->willReturn($anyOptions);

        $factory = new Auth0ApiFactory();

        $service = $factory($container->reveal());

        $this->assertInstanceOf(Auth0Api::class, $service);
    }
}
