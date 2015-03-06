<?php
namespace Riskio\Auth0ModuleTest\Hydrator;

use Riskio\Auth0Module\Entity\Auth0UserEntity;
use Riskio\Auth0Module\Hydrator\Auth0UserHydrator;

class Auth0UserHydratorTest extends \PHPUnit_Framework_TestCase
{
    public function testHydrateAuth0UserEntityWithSkdUserInfo()
    {
        $userInfo = [
            'user_id'      => 123,
            'access_token' => 'foo',
        ];

        $hydrator = new Auth0UserHydrator();

        $entity = $hydrator->hydrate($userInfo, new Auth0UserEntity());
        $this->assertSame($userInfo['user_id'],      $entity->getId());
        $this->assertSame($userInfo['access_token'], $entity->getToken());
    }
}
