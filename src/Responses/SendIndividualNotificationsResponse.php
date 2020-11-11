<?php

namespace true9\OSWrapper\Responses;

class SendIndividualNotificationsResponse extends AbstractResponse
{

    public function build($response = null)
    {
        $status = $response['info']['http_code'];

        if ($status == 400) {
            $this->success = false;
            $this->responseCode = 400;
            $this->errors = $response['result']['errors'];
        } else {
            $this->success = true;
        }

        $errors = $response['result']['errors'];
        if (count($errors) > 0) {
            $this->partialSuccess = true;
        }

        $this->responseCode = $status;
        $this->id = $response['result']['id'];
        $this->data = $response['result'];

        return $this;
    }
}