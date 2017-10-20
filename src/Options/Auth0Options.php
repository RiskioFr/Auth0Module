<?php

declare(strict_types=1);

namespace Riskio\Auth0Module\Options;

use Zend\Stdlib\AbstractOptions;

final class Auth0Options extends AbstractOptions
{
    private $account;

    private $token;

    private $clientId;

    private $clientSecret;

    private $redirectUri;

    public function setAccount(string $account)
    {
        $this->account = $account;
    }

    public function getAccount() : string
    {
        return $this->account;
    }

    public function getDomain() : string
    {
        if (empty($this->account)) {
            return '';
        }

        return $this->account . '.auth0.com';
    }

    public function setToken(string $token)
    {
        $this->token = $token;
    }

    public function getToken() : string
    {
        return $this->token;
    }

    public function setClientId(string $id)
    {
        $this->clientId = $id;
    }

    public function getClientId() : string
    {
        return $this->clientId;
    }

    public function setClientSecret(string $secret)
    {
        $this->clientSecret = $secret;
    }

    public function getClientSecret() : string
    {
        return $this->clientSecret;
    }

    public function setRedirectUri(string $uri)
    {
        $this->redirectUri = $uri;
    }

    public function getRedirectUri() : string
    {
        return $this->redirectUri;
    }
}
