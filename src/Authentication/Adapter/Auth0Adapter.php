<?php
namespace Riskio\Auth0Module\Authentication\Adapter;

use Exception;
use League\OAuth2\Client\Grant\AuthorizationCode;
use Riskio\Auth0Module\Authentication\OAuth2Result;
use League\OAuth2\Client\Provider\ProviderInterface;
use Zend\Authentication\Adapter\AdapterInterface;

class Auth0Adapter implements AdapterInterface
{
    /**
     * @var ProviderInterface
     */
    protected $oauthProvider;

    /**
     * @var string
     */
    protected $code;

    /**
     * @param ProviderInterface $oauthProvider
     */
    public function __construct(ProviderInterface $oauthProvider)
    {
        $this->oauthProvider = $oauthProvider;
    }

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = (string) $code;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * {@inheritdoc}
     */
    public function authenticate()
    {
        if (empty($this->code)) {
            return new OAuth2Result(
                OAuth2Result::FAILURE_CREDENTIAL_INVALID,
                null,
                ['No code specified']
            );
        }

        try {
            $token = $this->getAccessToken();

            /* @var $user \League\OAuth2\Client\Entity\User */
            $user = $this->oauthProvider->getUserDetails($token);
            if (!$user) {
                return new Result(
                    OAuth2Result::FAILURE_IDENTITY_NOT_FOUND,
                    $this->code,
                    [
                        sprintf(
                            'Failed to retrieve user related to access token "%s"',
                            $token
                        )
                    ]
                );
            }

            $result = new OAuth2Result(OAuth2Result::SUCCESS, $user);
            $result->setAccessToken($token);

            return $result;
        } catch (Exception $e) {
            return new OAuth2Result(
                OAuth2Result::FAILURE_CREDENTIAL_INVALID,
                $this->code,
                [$e->getMessage()]
            );
        }
    }

    /**
     * @return \League\OAuth2\Client\Token\AccessToken
     */
    protected function getAccessToken()
    {
        $grant = new AuthorizationCode();

        return $this->oauthProvider->getAccessToken($grant, [
            'code' => $this->code,
        ]);
    }
}
