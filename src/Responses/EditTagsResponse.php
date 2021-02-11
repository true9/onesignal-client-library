<?php

namespace true9\OSWrapper\Responses;

class EditTagsResponse extends AbstractResponse
{
    public function build($response = null)
    {
        if (in_array($response['info']['http_code'], [200, 202])) {
            $this->success = true;
        } else {
            $this->success = false;
        }

        $this->responseCode = $response['info']['http_code'];
        $this->data = $response['result'];

        return $this;
    }
}