<?php
namespace Riskio\Auth0Module\Options;

use Zend\Stdlib\AbstractOptions;

class Auth0Options extends AbstractOptions
{
    /**
     * @var string
     */
    protected $account;

    /**
     * @var string
     */
    protected $token;

    /**
     * @var string
     */
    protected $clientId;

    /**
     * @var string
     */
    protected $clientSecret;

    /**
     * @var string
     */
    protected $redirectUri;

    /**
     * @param string $account
     */
    public function setAccount($account)
    {
        $this->account = (string) $account;
    }

    /**
     * @return string
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @return string|null
     */
    public function getDomain()
    {
        if (empty($this->account)) {
            return null;
        }

        return $this->account . '.auth0.com';
    }

    /**
     * @param string $token
     */
    public function setToken($token)
    {
        $this->token = (string) $token;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param string $id
     */
    public function setClientId($id)
    {
        $this->clientId = (string) $id;
    }

    /**
     * @return string
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * @param string $secret
     */
    public function setClientSecret($secret)
    {
        $this->clientSecret = (string) $secret;
    }

    /**
     * @return string
     */
    public function getClientSecret()
    {
        return $this->clientSecret;
    }

    /**
     * @param string $uri
     */
    public function setRedirectUri($uri)
    {
        $this->redirectUri = (string) $uri;
    }

    /**
     * @return string
     */
    public function getRedirectUri()
    {
        return $this->redirectUri;
    }
}
