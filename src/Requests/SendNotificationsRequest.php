<?php

namespace true9\OSWrapper\Requests;

use true9\OSWrapper\CurlClient;
use true9\OSWrapper\Exceptions\IllegalArgumentException;
use true9\OSWrapper\Responses\SendNotificationsResponse;

class SendNotificationsRequest extends AbstractRequest
{
    private $includedSegments;
    private $contents;
    private $headings;
    private $data;
    private $url;
    private $chromeWebImage;

    public function __construct()
    {
        $this->curl = new CurlClient("/notifications");
    }

    /**
     * Dispatch the request
     */
    public function dispatch()
    {
        $properties = [
            'included_segments' => $this->includedSegments,
            'app_id' => $this->appId,
            'contents' => $this->contents,
            'headings' => $this->headings,
            'data' => $this->data,
            'url' => $this->url,
            'chrome_web_image' => $this->chromeWebImage
        ];

        $result = $this->curl->post($properties);
        return (new SendNotificationsResponse())->build($result);
    }

    /**
     * @param array $includedSegments Array of user segments to send the notification to, defaults to "Subscribed Users"
     * @return $this
     * @throws IllegalArgumentException
     */
    public function setIncludedSegments($includedSegments = [])
    {
        if ($includedSegments == null) {
            $includedSegments = ["Subscribed Users"];
        } else if (!is_array($includedSegments)) {
            throw new IllegalArgumentException("Included segments must be array of string values");
        }

        $this->includedSegments = $includedSegments;
        return $this;
    }

    /**
     * @param array $contents - Array of message contents with language code (eg. "en") as the key, content as the value
     * @return $this
     */
    public function setContents($contents = [])
    {
        $this->contents = $contents;
        return $this;
    }

    /**
     * @param array $headings Array of headings with language code (eg. "en") as the key, content as value, required for web
     * @return $this
     */
    public function setHeadings($headings = [])
    {
        $this->headings = $headings;
        return $this;
    }

    /**
     * @param array $data Optional array of KV pairs to include with the notification
     * @return $this
     */
    public function setData($data = [])
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @param null|string $url URL to open when notification is interacted with
     * @return $this
     */
    public function setUrl($url = null)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @param null|string $chromeWebImage URL for image to be displayed on notification by Chrome browser
     * @return $this
     */
    public function setChromeWebImage($chromeWebImage = null)
    {
        $this->chromeWebImage = $chromeWebImage;
        return $this;
    }
}