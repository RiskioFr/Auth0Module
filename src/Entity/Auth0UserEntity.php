<?php
namespace Riskio\Auth0Module\Entity;

class Auth0UserEntity
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $token;

    /**
     * @param  int $id
     * @return self
     */
    public function setId($id)
    {
        $this->id = (int) $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  string $token
     * @return self
     */
    public function setToken($token)
    {
        $this->token = (string) $token;
        return $this;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }
}