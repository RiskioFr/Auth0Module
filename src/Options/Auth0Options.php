<?php
namespace Riskio\Auth0Module\Options;

use Zend\Stdlib\AbstractOptions;

class Auth0Options extends AbstractOptions
{
    /**
     * @var string
     */
    protected $domain;

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
     * @var bool
     */
    protected $persistUserInfo;

    /**
     * @var bool
     */
    protected $persistAccessToken;

    /**
     * @var bool
     */
    protected $persistIdToken;

    /**
     * @var bool
     */
    protected $store;

    /**
     * @param  string $domain
     * @return self
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;
        return $this;
    }

    /**
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
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

    /**
     * @return bool
     */
    public function getPersistUserInfo()
    {
        return $this->persistUserInfo;
    }

    /**
     * @param  bool $persist
     * @return self
     */
    public function setPersistUserInfo($persist)
    {
        $this->persistUserInfo = (bool) $persist;
        return $this;
    }

    /**
     * @return bool
     */
    public function getPersistAccessToken()
    {
        return $this->persistAccessToken;
    }

    /**
     * @param  bool $persist
     * @return self
     */
    public function setPersistAccessToken($persist)
    {
        $this->persistAccessToken = (bool) $persist;
        return $this;
    }

    /**
     * @return bool
     */
    public function getPersistIdToken()
    {
        return $this->persistIdToken;
    }

    /**
     * @param  bool $persist
     * @return self
     */
    public function setPersistIdToken($persist)
    {
        $this->persistIdToken = (bool) $persist;
        return $this;
    }

    /**
     * @return bool
     */
    public function getStore()
    {
        return $this->store;
    }

    /**
     * @param  bool $store
     * @return self
     */
    public function setStore($store)
    {
        $this->store = (bool) $store;
        return $this;
    }
}
