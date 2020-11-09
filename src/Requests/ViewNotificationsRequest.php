<?php

namespace true9\OSWrapper\Requests;

use true9\OSWrapper\CurlClient;
use true9\OSWrapper\Exceptions\IllegalArgumentException;
use true9\OSWrapper\Responses\ViewNotificationsResponse;

class ViewNotificationsRequest extends AbstractRequest
{
    /**
     * @var int maximum number of results to return from API, default + max is 50
     */
    private $limit = 50;

    /**
     * @var int offset to shift results by, default is 0
     */
    private $offset = 0;

    /**
     * @throws IllegalArgumentException
     */
    public function dispatch()
    {
        if (empty($this->appId)) {
            throw new IllegalArgumentException("App id must be provided");
        }

        $endpoint = "/notifications?app_id={$this->appId}"
            . "&limit={$this->limit}&offset={$this->offset}";
        $this->curl = new CurlClient($endpoint);

        $result = $this->curl->get();
        return (new ViewNotificationsResponse())->build($result);
    }
}