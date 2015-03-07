<?php
namespace Riskio\Auth0ModuleTest\Hydrator;

use Riskio\Auth0Module\Entity\Auth0UserEntity;
use Riskio\Auth0Module\Hydrator\Auth0UserHydrator;

class Auth0UserHydratorTest extends \PHPUnit_Framework_TestCase
{
    public function userIdProvider()
    {
        return [
            ['auth0|123', 123],
            ['google-oauth2|123', 123],
        ];
    }

    /**
     * @dataProvider userIdProvider
     */
    public function testHydrateAuth0UserEntityWithUserId($provided, $expected)
    {
        $userInfo = ['user_id' => $provided];

        $hydrator = new Auth0UserHydrator();
        $entity = $hydrator->hydrate($userInfo, new Auth0UserEntity());

        $this->assertSame($expected, $entity->getId());
    }

    public function testHydrateAuth0UserEntityWithAccessToken()
    {
        $userInfo = ['access_token' => 'foo'];

        $hydrator = new Auth0UserHydrator();
        $entity = $hydrator->hydrate($userInfo, new Auth0UserEntity());

        $this->assertSame($userInfo['access_token'], $entity->getToken());
    }
}
