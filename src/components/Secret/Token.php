<?php
namespace Myele\Component\Secret;

class Token
{
    const DELAY_TIME = 300;

    private $app;

    public function __construct($app)
    {
        $this->app = $app;
        //dd($this->app);
        //dd($this->app['request']->server->get('REQUEST_TIME'));
    }

    public function output()
    {
        return $this->markToken();
    }

    public function check($token=null)
    {
        // test  token must as a param past to this function;
        return $this->checkToken($this->markToken());
    }

    private function markToken()
    {
        //  !!! must add session_id later !!!
        $randomNumber = mt_rand(1000, 9999);
        $requestTime = dechex($this->app['request']->server->get('REQUEST_TIME') - $randomNumber);
        return $randomNumber.substr(md5($randomNumber.$this->app['secret']['secret_token']), 0, 10).$requestTime;
    }

    private function checkToken($str, $delay=self::DELAY_TIME)
    {
        $firstString = substr($str, 0, 4);
        $middleString = substr($str, 0, 14);
        $lastString = substr($str, 14, 8);
        return ($middleString === $firstString.substr(md5($firstString.$this->app['secret']['secret_token']), 0, 10))
            && ($this->app['request']->server->get('REQUEST_TIME') - hexdec($lastString) - $firstString < $delay);
    }
}
