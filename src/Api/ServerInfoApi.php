<?php

namespace PhpXrp\Api;

/**
 * Class ServerInfoApi
 * @package PhpXrp\Api
 */
class ServerInfoApi extends BaseApi
{
    /**
     * ServerInfoApi constructor.
     * @param string $uri
     */
    public function __construct($uri = BaseApi::DEFAULT_BASE_URI)
    {
        parent::__construct($uri);
    }

    /**
     * @return mixed
     */
    public function getFee()
    {
        $response = $this->client->request('POST', '', [
            'json' => [
                'method' => 'fee',
                'params' => []
            ]
        ]);

        return json_decode($response->getBody(), true);
    }

    /**
     * @return mixed
     */
    public function getInfo()
    {
        $response = $this->client->request('POST', '', [
            'json' => [
                'method' => 'server_info',
                'params' => []
            ]
        ]);

        return json_decode($response->getBody(), true);
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        $response = $this->client->request('POST', '', [
            'json' => [
                'method' => 'server_state',
                'params' => []
            ]
        ]);

        return json_decode($response->getBody(), true);
    }
}