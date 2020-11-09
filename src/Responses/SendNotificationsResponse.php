<?php

namespace true9\OSWrapper\Responses;

class SendNotificationsResponse extends AbstractResponse
{

    public function build($response = null)
    {
        $status = $response['info']['status_code'];

        if ($status == 400) {
            $this->success = false;
            $this->responseCode = 400;
            $this->errors = $response['result']['errors'];
        }

        $errors = $response['result']['errors'];
        if (count($errors) > 0) {
            $this->partialSuccess = true;
        }


    }
}