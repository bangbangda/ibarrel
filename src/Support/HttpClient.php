<?php
namespace Bangbangda\Ibarrel\Support;

use GuzzleHttp\Client;

class HttpClient
{
    private $apiDomain = 'http://api.ibarrel.com.cn';

    private $config = null;
    public function __construct(array $config)
    {
        $this->config = $config;
    }

    public function request(array $params, $method = 'post', string $uri = '/v1/Openapi/wine')
    {
        $signUtil = new SignUtil($this->config);

        $params['appid'] = $this->config['app_id'];

        $params['sign'] = $signUtil->getData($params);
        info(json_encode($params));
        $response = $this->getClient()->request($method, $uri, ['form_params' => $params]);

        return json_decode($response->getBody());
    }


    public function getClient()
    {
        return new Client([
            // Base URI is used with relative requests
            'base_uri' => $this->apiDomain,
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
    }
}
