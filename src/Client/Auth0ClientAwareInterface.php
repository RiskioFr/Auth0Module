<?php
namespace Riskio\Auth0Module\Client;

interface Auth0ClientAwareInterface
{
    /**
     * @param  Auth0Client $client
     * @return self
     */
    public function setAuth0Client(Auth0Client $client);
}
