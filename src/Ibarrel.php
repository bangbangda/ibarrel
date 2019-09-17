<?php

namespace Bangbangda\Ibarrel;

use Bangbangda\Ibarrel\Support\HttpClient;

class Ibarrel
{
    private $httpClient = null;

    private $config = null;

    public function __construct($config)
    {
        $this->config = $config;

        $this->httpClient = new HttpClient($config);
    }


    public function info(array $params)
    {
        $params['action'] = 'getinfo';

        $result = $this->httpClient->request($params);

        dd($result);
    }


}
