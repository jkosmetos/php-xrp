<?php

namespace PhpXrp\Api;

use GuzzleHttp\Client;

/**
 * Class BaseApi
 * @package PhpXrp\Api
 */
class BaseApi
{
    /**
     * Constants
     */
    const DEFAULT_BASE_URI = 'http://s1.ripple.com:51234';
    const ROLE_USER = 'user';
    const ROLE_GATEWAY = 'gateway';

    /**
     * @var Client
     */
    protected $client;

    /**
     * BaseApi constructor.
     * @param string $uri
     */
    public function __construct($uri = self::DEFAULT_BASE_URI)
    {

        $this->client = new Client([
            'base_uri' => $uri
        ]);

    }
}