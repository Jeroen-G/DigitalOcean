<?php

use JeroenG\DigitalOcean\Api;
use PHPUnit\Framework\TestCase;
use JeroenG\DigitalOcean\DigitalOcean;

class ApiTest extends TestCase
{
    public $flickr;

    public function __construct()
    {
        $this->do = new DigitalOcean(new Api($_ENV['DO_API_AUTH_KEY']));
    }

    public function testAccountStatus()
    {
        $test = $this->do->account('helloworld');

        $this->assertEquals('active', $test->getContent('status'));
    }
}
