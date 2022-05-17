<?php

namespace Payeer;

use Payeer\Exceptions\InvalidConfigurationClientException;
use Exception;

class ApiClient
{
    private ?string $baseUrl = null;
    private array $options = [];
    
    /**
     * @throws InvalidConfigurationClientException
     */
    public function __construct(array $config = [])
    {
        $this->configure($config);
    }
    
    public function request(array $params = [])
    {
        $options['post']['ts'] = round(microtime(true) * 1000);
        
        $post = json_encode($params['post']);
        
        $sign = hash_hmac('sha256', $options['method'] . $post, $this->options['key']);
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://payeer.com/api/trade/" . $params['method']);
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'API-ID: ' . $this->options['id'],
            'API-SIGN: ' . $sign,
        ]);
        
        $response = curl_exec($ch);
        curl_close($ch);
        
        $responseData = json_decode($response, true);
        
        if ($responseData['success'] !== true) {
            $this->errors = $responseData['error'] ?? null;
            
            throw new Exception($responseData['error']['code']  ?? null);
        }
        
        return $responseData;
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
