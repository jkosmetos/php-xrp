<?php

namespace PhpXrp\Api;


/**
 * Class UtilityApi
 * @package PhpXrp\Api
 */
class UtilityApi extends BaseApi
{
    /**
     * UtilityApi constructor.
     * @param string $uri
     */
    public function __construct($uri = BaseApi::DEFAULT_BASE_URI)
    {
        parent::__construct($uri);
    }

    /**
     * @return mixed
     */
    public function ping()
    {
        $response = $this->client->request('POST', '', [
            'json' => [
                'method' => 'ping',
                'params' => []
            ]
        ]);

        return json_decode($response->getBody(), true);
    }

    /**
     * @return mixed
     */
    public function getRandomHex()
    {
        $response = $this->client->request('POST', '', [
            'json' => [
                'method' => 'random',
                'params' => []
            ]
        ]);

        return json_decode($response->getBody(), true);
    }

}