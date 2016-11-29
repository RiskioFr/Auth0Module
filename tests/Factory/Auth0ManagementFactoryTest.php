<?php
namespace Riskio\Auth0ModuleTest\Factory;

use Auth0\SDK\API\Management;
use Interop\Container\ContainerInterface;
use Riskio\Auth0Module\Factory\Auth0ManagementFactory;
use Riskio\Auth0Module\Options\Auth0Options;

class Auth0ManagementFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function createService_GivenServiceManagerThatContainsService_ShouldReturnAuth0ClientInstance()
    {
        $anyOptions = $this->createMock(Auth0Options::class);
        $container = $this->prophesize(ContainerInterface::class);
        $container->get(Auth0Options::class)->willReturn($anyOptions);

        $factory = new Auth0ManagementFactory();

        $service = $factory($container->reveal());

        $this->assertInstanceOf(Management::class, $service);
    }
}
