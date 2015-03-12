<?php
namespace Riskio\Auth0Module\Authentication;

use Zend\Authentication\Result;

class OAuth2Result extends Result
{
    /**
     * @var string
     */
    protected $accessToken;

    /**
     * @param string $accessToken
     */
    public function setAccessToken($accessToken)
    {
        $this->accessToken = (string) $accessToken;
    }

    /**
     * @return string
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }
}
