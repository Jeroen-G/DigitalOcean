<?php

namespace JeroenG\DigitalOcean;


use Psr\Http\Message\ResponseInterface;

class Response
{

    /**
     * The API method called by the request.
     *
     * @var string
     */
    protected $method;

    /**
     * The raw Guzzle response.
     *
     * @var \Psr\Http\Message\ResponseInterface
     */
    protected $response;

    /**
     * The contents of the response from DigitalOcean.
     *
     * @var object
     */
    protected $contents;

    /**
     * Create a new Response instance.
     *
     * @param string $call
     * @param \Psr\Http\Message\ResponseInterface $guzzleResponse
     */
    public function __construct(string $call, ResponseInterface $guzzleResponse)
    {
        $this->method = $call;
        $this->response = $guzzleResponse;
        $this->contents = json_decode($guzzleResponse->getBody()->getContents(), true);
    }

    /**
     * Get the content, or a value in it, from the response.
     *
     * @param  string $method
     * @return string
     */
    public function getContent($variable = null)
    {
        return $variable ? $this->contents[$this->method][$variable] : $this->contents[$this->method];
    }

    /**
     * Get the raw Guzzle response.
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function getRawResponse()
    {
        return $this->response;
    }

    /**
     * Get the HTTP response status code.
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->getRawResponse()->getStatusCode();
    }

    /**
     * Get the Guzzle response HTTP headers.
     *
     * @return array
     */
    public function getHeaders()
    {
        return $this->getRawResponse()->getHeaders();
    }

    /**
     * Get magically a value from the contents of the API call.
     *
     * @param  string $variable
     * @return mixed
     */
    public function __get($variable)
    {
        return $this->getContent($variable);
    }
}
