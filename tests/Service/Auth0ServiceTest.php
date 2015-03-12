<?php
namespace Riskio\Auth0ModuleTest\Service;

use Riskio\Auth0Module\Service\Auth0Service;

class Auth0ServiceTest extends \PHPUnit_Framework_TestCase
{
    public function testGetUserReturnAuth0UserEntityInstance()
    {
        $userDummy = $this->getMock('League\OAuth2\Client\Entity\User');

        $authServiceStub = $this->getMockBuilder('Zend\Authentication\AuthenticationServiceInterface')
            ->disableOriginalConstructor()
            ->getMock();
        $authServiceStub
            ->method('getIdentity')
            ->will($this->returnValue($userDummy));

        $auth0Service = new Auth0Service($authServiceStub);

        $user = $auth0Service->getUser();
        $this->assertInstanceOf('League\OAuth2\Client\Entity\User', $user);
    }

    public function testLogoutShouldClearIdentity()
    {
        $authServiceStub = $this->getMockBuilder('Zend\Authentication\AuthenticationServiceInterface')
            ->disableOriginalConstructor()
            ->getMock();
        $authServiceStub
            ->expects($this->once())
            ->method('clearIdentity');

        $auth0Service = new Auth0Service($authServiceStub);
        $auth0Service->logout();
    }
}
