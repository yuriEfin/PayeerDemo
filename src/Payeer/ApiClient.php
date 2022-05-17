<?php

namespace Payeer;

use GuzzleHttp\Psr7\Response;
use Payeer\Exceptions\InvalidConfigurationClientException;
use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\GuzzleException;

class ApiClient
{
    private ?string $baseUrl = null;
    private ?ClientInterface $httpClient = null;
    private array $options = [];
    
    /**
     * @throws InvalidConfigurationClientException
     */
    public function __construct(ClientInterface $httpClient, array $config = [])
    {
        $this->configure($config);
        $this->httpClient = $httpClient;
    }
    
    /**
     * @param       $httpMethod
     * @param array $params - for curl options and forward URI endpoint api
     *
     * @return ResponseInterface | Response
     * @throws GuzzleException
     */
    public function request($httpMethod = 'GET', array $params = []): ResponseInterface
    {
        $config = $params;
        unset($params['endpoint']);
        
        return $this->httpClient->request($httpMethod, $this->buildUri($params['uri']), $config);
    }
    
    protected function buildUri($endpoint)
    {
        return rtrim($this->baseUrl, '/') . '/' . ltrim($endpoint);
    }
    
    protected function configure(array $config = []): void
    {
        if (!isset($config['baseUrl'])) {
            throw new InvalidConfigurationClientException('Property "baseUrl" required, add this property to config');
        }
        
        foreach ($config as $property => $value) {
            if (!property_exists($this, $property)) {
                throw new InvalidConfigurationClientException('Undefined property ' . $property);
            }
        }
    }
}
