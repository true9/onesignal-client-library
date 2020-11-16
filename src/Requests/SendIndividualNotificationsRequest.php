<?php

namespace true9\OSWrapper\Requests;

use true9\OSWrapper\CurlClient;
use true9\OSWrapper\Exceptions\IllegalArgumentException;
use true9\OSWrapper\Responses\SendIndividualNotificationsResponse;

class SendIndividualNotificationsRequest extends AbstractRequest
{
    private $includedIds = [];
    private $contents = [];
    private $data = [];
    private $url;

    public function dispatch()
    {
        if (empty($this->appId)) {
            throw new IllegalArgumentException('App id must be provided');
        }

        $this->curl = new CurlClient("/notifications");

        $properties = [
            'app_id' => $this->appId,
            'include_player_ids' => $this->includedIds,
            'contents' => $this->contents,
            'url' => $this->url
        ];

        if (count(array_keys($this->data))) {
            $properties['data'] = $this->data;
        }

        $result = $this->curl->post($properties);
        return (new SendIndividualNotificationsResponse())->build($result);
    }

    public function setIncludedIds($includedIds = [])
    {
        $this->includedIds = $includedIds;
        return $this;
    }

    public function setContents($contents = [])
    {
        $this->contents = $contents;
        return $this;
    }

    public function setData($data = [])
    {
        $this->data = $data;
        return $this;
    }

    public function setUrl($url = null)
    {
        $this->url = $url;
        return $this;
    }
}