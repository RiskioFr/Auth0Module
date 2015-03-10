<?php
namespace Riskio\Auth0ModuleTest\Client;

use Mockery;
use Riskio\Auth0Module\Client\Auth0Client;

class Auth0ClientTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @runInSeparateProcess
     */
    public function testGetHttpClientReturnGuzzleInstanceWithBaseUrl()
    {
        $auth0SdkStub = Mockery::mock('overload:Auth0SDK\Auth0');
        $auth0SdkStub->shouldReceive('getIdToken');

        $auth0Client = new Auth0Client($auth0SdkStub);

        $httpClient = $auth0Client->getHttpClient();
        $this->assertInstanceOf('GuzzleHttp\Client', $httpClient);
        $this->assertNotNull($httpClient->getBaseUrl());
    }

    /**
     * @runInSeparateProcess
     */
    public function testGetHttpClientReturnGuzzleInstanceWithAuthenticationHeader()
    {
        $idToken = 'foo';

        $auth0SdkStub = Mockery::mock('overload:Auth0SDK\Auth0');
        $auth0SdkStub->shouldReceive('getIdToken')->andReturn($idToken);

        $auth0Client = new Auth0Client($auth0SdkStub);

        $httpClient = $auth0Client->getHttpClient();
        $this->assertInstanceOf('GuzzleHttp\Client', $httpClient);

        $headers = $httpClient->getDefaultOption('headers');
        $this->assertInternalType('array', $headers);
        $this->assertArrayHasKey('Authorization', $headers);
        $this->assertEquals('Bearer ' . $idToken, $headers['Authorization']);
    }
}
