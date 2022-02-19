<?php

namespace HttpClient;

ini_set("display_errors", 0);

use Exception;

class Http
{
    /**
     * var $url
     */
    private $url = "";

    /**
     * var $headers
     */

    private $headers = [];

    /**
     * var $options
     */

    private $options = [];

    /**
     * var $requestMethod
     */

    private $requestMethod = "";

    /**
     * var $payload
     */

    private $payload = [];

    /**
     * var $response_headers
     */

    private $response_headers = [];

    /**
     * Method to set EndpointURL
     */

    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * Method to get Endpoint URL
     */

    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Method to set request method i.e GET, POST etc
     */

    public function setRequestMethod($requestMethod)
    {
        $this->requestMethod = $requestMethod;
    }

    /**
     * Method to get request method 
     */

    public function getRequestMethod()
    {
        return $this->requestMethod;
    }


    /**
     * Method to set Headers
     */

    public function setHeaders($headers)
    {
        $this->headers = $headers;
    }

    /**
     * Method to get headers
     */

    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * Method to set payload
     */

    public function setPayLoad($data)
    {
        $this->payload = $data;
    }

    /**
     * Method to get payload
     */

    public function getPayLoad()
    {
        return json_encode($this->payload);
    }

    /**
     * Method to set options
     */

    public function setOptions()
    {
        $this->options = [
            'http' => [
                'header' => $this->getHeaders(),
                'method' => $this->getRequestMethod(),
                'content' => $this->getPayLoad()
            ]
        ];
    }

    /**
     * Method to get options
     */

    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Method to make request to Endpoint
     */

    public function makeRequest()
    {
        try {
            $context = stream_context_create($this->getOptions());
            file_get_contents($this->getUrl(), false, $context);
            $this->response_headers = $http_response_header;
        } catch (Exception $ex) {
            throw new Exception("Error");
        }
    }
    /**
     * Method to get response code
     */

    public function getCode()
    {
        $explode = explode(" ", $this->response_headers[0]);
        return $explode[1];
    }

    /**
     * Method to ger Nessage
     */

    public function getMessage()
    {
        $explode = explode(" ", $this->response_headers[0]);
        return $explode[2];
    }

    /**
     * Method to get response headers
     */

    public function getResponseHeaders()
    {
        return $this->response_headers;
    }
}
