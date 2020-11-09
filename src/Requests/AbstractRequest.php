<?php

namespace true9\OSWrapper\Requests;

use true9\OSWrapper\CurlClient;

abstract class AbstractRequest
{
    /**
     * @var CurlClient instance of the CurlClient
     */
    protected $curl;

    /**
     * @var appId OneSignal app id
     */
    protected $appId;

    public abstract function dispatch();

    /**
     * @param string $appId OneSignal app id to send the notifications for
     * @return $this
     */
    public function setAppId($appId = null)
    {
        $this->appId = $appId;
        return $this;
    }
}