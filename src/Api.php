<?php

namespace JeroenG\DigitalOcean;

use GuzzleHttp\Client;

class Api
{

    /**
     * DigitalOcean API endpoint
     *
     * @var string
     */
    protected $endpoint = 'https://api.digitalocean.com/v2/';

    /**
     * Guzzle Client instance.
     *
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * Create a new DigitalOcean API instance.
     *
     * @param  string $token
     * @return void
     */
    public function __construct(string $token)
    {
        $this->client = new Client([
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
            ],
            'base_uri' => $this->endpoint,
        ]);
    }

    /**
     * Make a DigitalOcean API request.
     *
     * @param  string                   $call
     * @return \JeroenG\DigitalOcean\Response | string
     */
    public function request(string $call)
    {
        $guzzleResponse = $this->client->get($call);

        if ($guzzleResponse->getStatusCode() == 200) {
            return new Response($call, $guzzleResponse);
        } else {
            return 'Failed request';
        }
    }

}
