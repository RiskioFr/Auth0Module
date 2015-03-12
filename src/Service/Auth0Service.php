<?php
namespace Riskio\Auth0Module\Service;

use League\OAuth2\Client\Entity\User as UserEntity;
use Zend\Authentication\AuthenticationServiceInterface;

class Auth0Service extends AbstractService
{
    /**
     * @var AuthenticationServiceInterface
     */
    protected $authService;

    /**
     * @param AuthenticationServiceInterface $authService
     */
    public function __construct(AuthenticationServiceInterface $authService)
    {
        $this->authService = $authService;
    }

    /**
     * @return UserEntity|null
     */
    public function getUser()
    {
        return $this->authService->getIdentity();
    }

    public function logout()
    {
        $this->authService->clearIdentity();
    }
}
