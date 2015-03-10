<?php
namespace Riskio\Auth0Module\Client;

trait Auth0ClientAwareTrait
{
    /**
     * @var Auth0Client
     */
    protected $client;

    /**
     * @param  Auth0Client $client
     * @return self
     */
    public function setAuth0Client(Auth0Client $client)
    {
        $this->client = $client;
        return $this;
    }

    /**
     * @return Auth0Client
     */
    public function getAuth0Client()
    {
        return $this->client;
    }
}
