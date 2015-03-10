<?php
namespace Riskio\Auth0Module\Client;

use Auth0SDK\Auth0;
use GuzzleHttp\Client as HttpClient;

class Auth0Client
{
    /**
     * @var Auth0
     */
    protected $auth0Sdk;

    /**
     * @var HttpClient
     */
    protected $client;

    /**
     * @param Auth0 $sdk
     */
    public function __construct(Auth0 $sdk)
    {
        $this->auth0Sdk = $sdk;
    }

    /**
     * @param HttpClient $client
     */
    public function setHttpClient(HttpClient $client)
    {
        $client->setDefaultOption('headers', [
            'Authorization' => 'Bearer ' . $this->auth0Sdk->getIdToken(),
        ]);

        $this->client = $client;
    }

    /**
     * @return HttpClient
     */
    public function getHttpClient()
    {
        if (!$this->client) {
            $httpClient = new HttpClient([
                'base_url' => 'https://login.auth0.com/api/v2/',
            ]);
            $this->setHttpClient($httpClient);
        }

        return $this->client;
    }

    /**
     * @param  string $method
     * @param  string $uri
     * @param  array $params
     * @return array
     */
    public function sendRequest($method, $uri, array $params = [])
    {
        $httpClient = $this->getHttpClient();
        $request = $httpClient->createRequest($method, $uri, $params);

        $response = $httpClient->send($request);

        return $response->json();
    }
}
