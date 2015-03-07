<?php
namespace Riskio\Auth0ModuleTest\Service;

use Riskio\Auth0Module\Service\Auth0Service;

class Auth0ServiceTest extends \PHPUnit_Framework_TestCase
{
    public function testGetUserReturnAuth0UserEntity()
    {
        $userInfo = ['user_id' => 123];

        $auth0SdkStub = $this->getMockBuilder('Auth0SDK\Auth0')
            ->disableOriginalConstructor()
            ->getMock();
        $auth0SdkStub
            ->method('getUserInfo')
            ->will($this->returnValue($userInfo));

        $auth0Service = new Auth0Service($auth0SdkStub);

        $entity = $auth0Service->getUser();
        $this->assertInstanceOf('Riskio\Auth0Module\Entity\Auth0UserEntity', $entity);
    }

    public function testGetUserWhenUserInfoIsEmptyReturnNull()
    {
        $auth0SdkStub = $this->getMockBuilder('Auth0SDK\Auth0')
            ->disableOriginalConstructor()
            ->getMock();
        $auth0SdkStub
            ->method('getUserInfo')
            ->will($this->returnValue(null));

        $auth0Service = new Auth0Service($auth0SdkStub);

        $entity = $auth0Service->getUser();
        $this->assertNull($entity);
    }
}
