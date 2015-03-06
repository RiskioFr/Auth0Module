<?php
namespace Riskio\Auth0ModuleTest\Service;

use Riskio\Auth0Module\Service\Auth0Service;

class Auth0ServiceTest extends \PHPUnit_Framework_TestCase
{
    public function testGetUserReturnAuth0UserEntity()
    {
        $auth0SdkStub = $this->getMockBuilder('Auth0SDK\Auth0')
            ->disableOriginalConstructor()
            ->getMock();
        $auth0SdkStub
            ->method('getUserInfo')
            ->will($this->returnValue([]));

        $auth0Service = new Auth0Service($auth0SdkStub);

        $entity = $auth0Service->getUser();
        $this->assertInstanceOf('Riskio\Auth0Module\Entity\Auth0UserEntity', $entity);
    }
}
