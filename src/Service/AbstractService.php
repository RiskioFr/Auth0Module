<?php
namespace Riskio\Auth0Module\Service;

use Riskio\Auth0Module\Client\Auth0ClientAwareInterface;
use Riskio\Auth0Module\Client\Auth0ClientAwareTrait;

abstract class AbstractService implements Auth0ClientAwareInterface
{
    use Auth0ClientAwareTrait;
}
