<?php
namespace Riskio\Auth0Module\Service;

use Auth0SDK\Auth0 as Auth0Sdk;
use Riskio\Auth0Module\Entity\Auth0UserEntity;
use Riskio\Auth0Module\Hydrator\Auth0UserHydrator;

class Auth0Service extends AbstractService
{
    /**
     * @var Auth0Sdk
     */
    protected $sdk;

    /**
     * @param Auth0Sdk $sdk
     */
    public function __construct(Auth0Sdk $sdk)
    {
        $this->sdk = $sdk;
    }

    /**
     * @return Auth0UserEntity|null
     */
    public function getUser()
    {
        $userInfo = $this->sdk->getUserInfo();
        if (!$userInfo) {
            return null;
        }

        $hydrator = new Auth0UserHydrator();

        return $hydrator->hydrate($userInfo, new Auth0UserEntity());
    }

    public function logout()
    {
        $this->sdk->logout();
    }
}
