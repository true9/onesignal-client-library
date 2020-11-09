<?php

namespace true9\OSWrapper\Requests;

use true9\OSWrapper\CurlClient;
use true9\OSWrapper\Exceptions\IllegalArgumentException;
use true9\OSWrapper\Responses\ViewDevicesResponse;

class ViewDevicesRequest extends AbstractRequest
{
    private $limit = 300;

    /**
     * Dispatch the request
     * @throws IllegalArgumentException
     */
    public function dispatch()
    {
        if (empty($this->appId)) {
            throw new IllegalArgumentException("No app id specified");
        }

        $this->curl = new CurlClient("/players?app_id={$this->appId}&limit={$this->limit}");

        $result = $this->curl->get();
        return (new ViewDevicesResponse())->build($result);
    }

    /**
     * @param int $limit Maximum amount of records to return, max is 300, default is 300
     * @return $this
     */
    public function setLimit($limit = 300)
    {
        $this->limit = $limit;
        return $this;
    }
}