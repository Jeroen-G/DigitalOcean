<?php

namespace JeroenG\DigitalOcean;

class DigitalOcean
{
    /**
     * The DigitalOcean v2 API.
     *
     * @var JeroenG\DigitalOcean\Api
     */
    protected $api;

    /**
     * Create a new instance to interact with the DO v2 API.
     *
     * @param \JeroenG\DigitalOcean\Api $api
     */
    public function __construct(Api $api)
    {
        $this->api = $api;
    }

    /**
     * Send a request over the DigitalOcean API.
     *
     * @param string $call
     * @return \JeroenG\DigitalOcean\Response | string
     */
    public function request(string $call)
    {
        return $this->api->request($call);
    }

    /**
     * Get account metadata.
     *
     * @return \JeroenG\DigitalOcean\Response | string
     */
    public function account()
    {
        return $this->request('account');
    }
}
