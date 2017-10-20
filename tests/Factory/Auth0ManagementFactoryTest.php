<?php
namespace Riskio\Auth0ModuleTest\Factory;

use Auth0\SDK\API\Management;
use Psr\Container\ContainerInterface;
use PHPUnit\Framework\TestCase;
use Riskio\Auth0Module\Factory\Auth0ManagementFactory;
use Riskio\Auth0Module\Options\Auth0Options;

class Auth0ManagementFactoryTest extends TestCase
{
    /**
     * @test
     */
    public function createService_GivenServiceManagerThatContainsService_ShouldReturnAuth0ClientInstance()
    {
        $auth0Options = new Auth0Options([
            'token' => 'foo',
            'account' => 'bar',
        ]);

        $container = $this->prophesize(ContainerInterface::class);
        $container->get(Auth0Options::class)->willReturn($auth0Options);

        $factory = new Auth0ManagementFactory();

        $service = $factory($container->reveal());

        $this->assertInstanceOf(Management::class, $service);
    }
}
