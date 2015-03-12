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
     * @param  string $account
     * @return self
     */
    public function setAccount($account)
    {
        $this->account = $account;
        return $this;
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
     * @param  string $token
     * @return self
     */
    public function setToken($token)
    {
        $this->token = $token;
        return $this;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param  string $id
     * @return self
     */
    public function setClientId($id)
    {
        $this->clientId = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * @param  string $secret
     * @return self
     */
    public function setClientSecret($secret)
    {
        $this->clientSecret = $secret;
        return $this;
    }

    /**
     * @return string
     */
    public function getClientSecret()
    {
        return $this->clientSecret;
    }

    /**
     * @return string
     */
    public function getRedirectUri()
    {
        return $this->redirectUri;
    }

    /**
     * @param  string $uri
     * @return self
     */
    public function setRedirectUri($uri)
    {
        $this->redirectUri = $uri;
        return $this;
    }
}
