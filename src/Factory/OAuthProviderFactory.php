<?php
namespace Riskio\Auth0Module\Factory;

use Interop\Container\ContainerInterface;
use Riskio\Auth0Module\Options\Auth0Options;
use Riskio\OAuth2\Client\Provider\Auth0 as OAuthProvider;

class OAuthProviderFactory
{
    public function __invoke(ContainerInterface $container) : OAuthProvider
    {
        /* @var $options Auth0Options */
        $options = $container->get(Auth0Options::class);

        return new OAuthProvider([
            'account'      => $options->getAccount(),
            'clientId'     => $options->getClientId(),
            'clientSecret' => $options->getClientSecret(),
            'redirectUri'  => $options->getRedirectUri(),
        ]);
    }
}
