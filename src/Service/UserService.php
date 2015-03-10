<?php
namespace Riskio\Auth0Module\Service;

class UserService extends AbstractService
{
    /**
     * @param  string $userId
     * @return array
     */
    public function getUser($userId)
    {
        return $this->client->sendRequest('GET', 'users/' . $userId);
    }

    /**
     * @param  string $userId
     * @param  array $params
     * @return array
     */
    protected function updateUser($userId, array $params)
    {
        return $this->client->sendRequest('GET', 'users/' . $userId, $params);
    }

    /**
     * @param  string $userId
     * @param  string $email
     * @param  bool $verify
     * @return array
     */
    public function updateUserEmail($userId, $email, $verify = false)
    {
        return $this->updateUser($userId, [
            'password'     => $email,
            'verify_email' => (bool) $verify,
        ]);
    }

    /**
     * @param  string $userId
     * @param  string $password
     * @param  bool $verify
     * @return array
     */
    public function updateUserPassword($userId, $password, $verify = false)
    {
        return $this->updateUser($userId, [
            'password'        => $password,
            'verify_password' => (bool) $verify,
        ]);
    }

    /**
     * @param  string $userId
     * @return array
     */
    public function deleteUser($userId)
    {
        return $this->client->sendRequest('DELETE', 'users/' . $userId);
    }

    /**
     * @param  string $userId
     * @return array
     */
    public function blockUser($userId)
    {
        return $this->updateUser($userId, [
            'blocked' => true,
        ]);
    }

    /**
     * @param  string $userId
     * @return array
     */
    public function unblockUser($userId)
    {
        return $this->updateUser($userId, [
            'blocked' => false,
        ]);
    }
}
