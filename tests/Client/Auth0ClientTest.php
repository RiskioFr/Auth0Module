<?php
namespace Riskio\Auth0ModuleTest\Client;

use Riskio\Auth0Module\Client\Auth0Client;

class Auth0ClientTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @runInSeparateProcess
     */
    public function testGetHttpClientReturnGuzzleInstanceWithBaseUrl()
    {
        $optionsStub = $this->getMock('Riskio\Auth0Module\Options\Auth0Options');

        $auth0Client = new Auth0Client($optionsStub);

        $httpClient = $auth0Client->getHttpClient();
        $this->assertInstanceOf('GuzzleHttp\Client', $httpClient);
        $this->assertNotNull($httpClient->getBaseUrl());
    }

    /**
     * @runInSeparateProcess
     */
    public function testGetHttpClientReturnGuzzleInstanceWithAuthenticationHeader()
    {
        $token = 'foo';

        $optionsStub = $this->getMock('Riskio\Auth0Module\Options\Auth0Options');
        $optionsStub
            ->method('getToken')
            ->will($this->returnValue($token));

        $auth0Client = new Auth0Client($optionsStub);

        $httpClient = $auth0Client->getHttpClient();
        $this->assertInstanceOf('GuzzleHttp\Client', $httpClient);

        $headers = $httpClient->getDefaultOption('headers');
        $this->assertInternalType('array', $headers);
        $this->assertArrayHasKey('Authorization', $headers);
        $this->assertEquals('Bearer ' . $token, $headers['Authorization']);
    }
}
