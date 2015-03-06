<?php
namespace Riskio\Auth0Module\Hydrator;

use Riskio\Auth0Module\Entity\Auth0UserEntity;
use Zend\Stdlib\Hydrator\ClassMethods as BaseHydrator;

class Auth0UserHydrator extends BaseHydrator
{
    /**
     * @param  array $data
     * @param  Auth0UserEntity $object
     * @return Auth0UserEntity
     */
    public function hydrate(array $data, $object)
    {
        parent::hydrate($data, $object);

        if (isset($data['user_id'])) {
            $object->setId($data['user_id']);
        }
        if (isset($data['access_token'])) {
            $object->setToken($data['access_token']);
        }

        return $object;
    }
}
