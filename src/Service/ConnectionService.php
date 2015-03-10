<?php
namespace Riskio\Auth0Module\Service;

class ConnectionService extends AbstractService
{
    /**
     * @param  string $strategy
     * @return array
     */
    public function getConnections($strategy = null)
    {
        $params = [];
        if ($strategy) {
            $params['strategy'] = $strategy;
        }

        return $this->client->sendRequest('GET', 'connections', $params);
    }

    /**
     * @param  string $connectionId
     * @return array
     */
    public function getConnection($connectionId)
    {
        return $this->client->sendRequest('GET', 'connections/' . $connectionId);
    }

    /**
     * @param  string $name
     * @param  string $strategy
     * @param  array $enabledClients
     * @return array
     */
    public function createConnection($name, $strategy = 'auth0', array $enabledClients = [])
    {
        return $this->client->sendRequest('POST', 'connections', [
            'name'     => $name,
            'strategy' => $strategy,
            'enabled_clients' => $enabledClients,
        ]);
    }

    /**
     * @param  string $connectionId
     * @return array
     */
    public function deleteConnection($connectionId)
    {
        return $this->client->sendRequest('DELETE', 'connections/' . $connectionId);
    }
}
