<?php

namespace true9\OSWrapper\Responses;

abstract class AbstractResponse
{
    /**
     * Indicates all requested actions were carried out successfully. If "partialSuccess" is a not null,
     * disregard this property's value and use "partialSuccess" instead.
     * @var success bool|null
     */
    public $success;

    /**
     * Some endpoints return a 200 when part of the requested action were unsuccessful while
     * other parts were successful. This property denotes such responses.
     * @var partialSuccess bool|null
     */
    public $partialSuccess = null;

    /**
     * The HTTP response code returned from OneSignal.
     * @var responseCode int
     */
    public $responseCode;

    /**
     * @var id string GUID attached to each response, presumably with the intent of using it as an
     * idempotency key for retries + exponential backoff.
     */
    public $id;

    /**
     * @var errors array|object Collection of errors in API response
     */
    public $errors;

    /**
     * @var data array|object Data returned in API response
     */
    public $data;

    public abstract function build($response = null);
}