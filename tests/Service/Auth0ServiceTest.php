<?php
namespace Riskio\Auth0ModuleTest\Service;

use League\OAuth2\Client\Entity\User;
use Riskio\Auth0Module\Service\Auth0Service;
use Zend\Authentication\AuthenticationServiceInterface;

class Auth0ServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function getUser_GivenAuthServiceProvidesIdentity_ShouldReturnAuth0UserEntityInstance()
    {
        $anyUser = $this->getMock(User::class);

        $authServiceStub = $this->getMock(AuthenticationServiceInterface::class);
        $authServiceStub
            ->method('getIdentity')
            ->will($this->returnValue($anyUser));

        $auth0Service = new Auth0Service($authServiceStub);

        $user = $auth0Service->getUser();
        $this->assertInstanceOf(User::class, $user);
    }

    /**
     * @test
     */
    public function logout_ShouldClearIdentity()
    {
        $authServiceStub = $this->getMock(AuthenticationServiceInterface::class);
        $authServiceStub
            ->expects($this->once())
            ->method('clearIdentity');

        $auth0Service = new Auth0Service($authServiceStub);
        $auth0Service->logout();
    }
}
