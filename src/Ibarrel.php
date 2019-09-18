<?php

namespace Bangbangda\Ibarrel;

use Bangbangda\Ibarrel\Support\HttpClient;
use Bangbangda\Ibarrel\Support\SignUtil;

/**
 * 接口操作类
 *
 * Class Ibarrel
 * @package Bangbangda\Ibarrel
 */
class Ibarrel
{
    private $httpClient = null;

    private $config = null;

    public function __construct($config)
    {
        $this->config = $config;

        $this->httpClient = new HttpClient($config);
    }

    /**
     * 获取酒品信息
     *
     * @param array $params
     * @return mixed
     */
    public function info(array $params)
    {
        $params['action'] = 'getinfo';

        return $this->httpClient->request($params);
    }

    /**
     * 出酒
     *
     * @param $params
     * @return mixed
     */
    public function outputWine($params)
    {
        $params['action'] = 'outputwine';

        return $this->httpClient->request($params);
    }

    /**
     * 出酒状态查询
     *
     * @param $params
     * @return mixed
     */
    public function outputWineStatus($params)
    {
        $params['action'] = 'query';

        return $this->httpClient->request($params);
    }
}
