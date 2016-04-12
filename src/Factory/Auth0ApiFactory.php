<?php
namespace Riskio\Auth0Module\Factory;

use Auth0\SDK\Auth0Api;
use Interop\Container\ContainerInterface;
use Riskio\Auth0Module\Options\Auth0Options;

class Auth0ApiFactory
{
    public function __invoke(ContainerInterface $container) : Auth0Api
    {
        /* @var $options Auth0Options */
        $options = $container->get(Auth0Options::class);

        return new Auth0Api($options->getToken(), $options->getDomain());
    }
}
