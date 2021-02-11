<?php

namespace true9\OSWrapper;

class CurlClient
{
    private $baseUrl = "https://onesignal.com/api/v1";
    private $curl;

    public function __construct($endpoint)
    {
        $this->curl = curl_init($this->url($endpoint));
    }

    public function post($data = [], $method = 'POST')
    {
        $json = json_encode($data);
        curl_setopt_array($this->curl, [
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => $json,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Content-Length: ' . strlen($json),
                'Authorization: Basic ' . getenv('ONESIGNAL_API_KEY')
            ],
        ]);

        $result = curl_exec($this->curl);

        return [
            'result' => json_decode($result, true),
            'info' => curl_getinfo($this->curl)
        ];
    }

    public function put($data = [])
    {
        return $this->post($data, 'PUT');
    }

    public function get()
    {
        curl_setopt_array($this->curl, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Authorization: Basic ' . getenv('ONESIGNAL_API_KEY')
            ]
        ]);

        $result = curl_exec($this->curl);

        return [
            'result' => json_decode($result, true),
            'info' => curl_getinfo($this->curl)
        ];
    }

    private function url($endpoint)
    {
        return $this->baseUrl . $endpoint;
    }
}