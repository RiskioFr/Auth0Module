<?php
namespace Riskio\Auth0Module\Factory;

use Auth0\SDK\Auth0Api;

class Auth0ApiFactory
{
    public function __invoke($serviceLocator)
    {
        /* @var $options \Riskio\Auth0Module\Options\Auth0Options */
        $options = $serviceLocator->get('Riskio\Auth0Module\Options\Auth0Options');

        return new Auth0Api($options->getToken(), $options->getDomain());
    }
}
