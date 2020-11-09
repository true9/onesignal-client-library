<?php

namespace true9\OSWrapper\Requests;

use true9\OSWrapper\CurlClient;
use true9\OSWrapper\Exceptions\IllegalArgumentException;
use true9\OSWrapper\Responses\ViewNotificationResponse;

class ViewNotificationRequest extends AbstractRequest
{
    private $notificationId;

    /**
     * @throws IllegalArgumentException
     */
    public function dispatch()
    {
        if (empty($this->notificationId)) {
            throw new IllegalArgumentException("Notification id must be provided");
        }

        $endpoint = "/notifications/{$this->notificationId}"
            . "?app_id={$this->appId}";
        $this->curl = new CurlClient($endpoint);

        $result = $this->curl->get();
        return (new ViewNotificationResponse())->build($result);
    }

    public function setNotificationId($notificationId = null)
    {
        $this->notificationId = $notificationId;
        return $this;
    }
}