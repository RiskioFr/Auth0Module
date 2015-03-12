<?php
namespace Riskio\Auth0Module\Client;

use GuzzleHttp\Client as HttpClient;
use Riskio\Auth0Module\Options\Auth0Options;

class Auth0Client
{
    /**
     * @var Auth0Options
     */
    protected $options;

    /**
     * @var HttpClient
     */
    protected $httpClient;

    /**
     * @param Auth0Options $options
     */
    public function __construct(Auth0Options $options)
    {
        $this->options = $options;
    }

    /**
     * @param HttpClient $client
     */
    public function setHttpClient(HttpClient $client)
    {
        $client->setDefaultOption('headers', [
            'Authorization' => 'Bearer ' . $this->options->getToken(),
        ]);

        $this->httpClient = $client;
    }

    /**
     * @return HttpClient
     */
    public function getHttpClient()
    {
        if (!$this->httpClient) {
            $httpClient = new HttpClient([
                'base_url' => 'https://login.auth0.com/api/v2/',
            ]);
            $this->setHttpClient($httpClient);
        }

        return $this->httpClient;
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
