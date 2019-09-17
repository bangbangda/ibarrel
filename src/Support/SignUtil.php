<?php
namespace Bangbangda\Ibarrel\Support;

class SignUtil
{
    private $appSecret = null;

    public function __construct(array $config)
    {
        $this->appSecret = $config['app_secret'];
    }

    public function getData(array $param, $encryptMethod = 'md5')
    {
        ksort($param);
        return call_user_func_array($encryptMethod, [urldecode(http_build_query($param)) . $this->appSecret]);
    }
}
