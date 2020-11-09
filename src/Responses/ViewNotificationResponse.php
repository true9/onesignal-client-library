<?php

namespace true9\OSWrapper\Responses;

class ViewNotificationResponse extends AbstractResponse
{
    public function build($response = null)
    {
        if ($response['info']['http_code'] == 200) {
            $this->success = true;
        } else {
            $this->success = false;
            $this->errors = $response['result']['errors'];
        }

        $this->responseCode = $response['info']['http_code'];
        $this->data = $response['result'];

        return $this;
    }
}