<?php

namespace true9\OSWrapper\Requests;

use true9\OSWrapper\CurlClient;
use true9\OSWrapper\Exceptions\IllegalArgumentException;
use true9\OSWrapper\Responses\ViewDeviceResponse;

class ViewDeviceRequest extends AbstractRequest
{
    private $playerId;

    /**
     * @throws IllegalArgumentException
     */
    public function dispatch()
    {
        if (empty($this->playerId)) {
            throw new IllegalArgumentException("Player ID must be provided");
        }

        $this->curl = new CurlClient("/players/{$this->playerId}?app_id={$this->appId}");
        $result = $this->curl->get();

        return (new ViewDeviceResponse())->build($result);
    }

    public function setPlayerId($playerId = null)
    {
        $this->playerId = $playerId;
        return $this;
    }
}