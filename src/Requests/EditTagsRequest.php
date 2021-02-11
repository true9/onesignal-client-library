<?php

namespace true9\OSWrapper\Requests;

use true9\OSWrapper\CurlClient;
use true9\OSWrapper\Exceptions\IllegalArgumentException;
use true9\OSWrapper\Responses\EditTagsResponse;

class EditTagsRequest extends AbstractRequest
{
    private $externalUserId;
    private $tags = [];

    public function dispatch()
    {
        if (empty($this->appId)) {
            throw new IllegalArgumentException('App ID must be provided');
        }

        if (empty($this->externalUserId)) {
            throw new IllegalArgumentException("External User ID must be provided");
        }

        $endpoint = "/apps/{$this->appId}/users/{$this->externalUserId}";
        $this->curl = new CurlClient($endpoint);

        $properties = [
            'tags' => $this->tags
        ];

        $result = $this->curl->put($properties);
        return (new EditTagsResponse())->build($result);
    }

    public function setExternalUserId($externalUserId)
    {
        $this->externalUserId = $externalUserId;
        return $this;
    }

    public function setTags($tags = [])
    {
        $this->tags = $tags;
        return $this;
    }
}