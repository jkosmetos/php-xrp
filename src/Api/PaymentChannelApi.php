<?php

namespace PhpXrp\Api;

/**
 * Class PaymentChannelApi
 * @package PhpXrp\Api
 */
class PaymentChannelApi extends BaseApi
{
    /**
     * PaymentChannelApi constructor.
     * @param string $uri
     */
    public function __construct($uri = BaseApi::DEFAULT_BASE_URI)
    {
        parent::__construct($uri);
    }

    /**
     * @param $channelId
     * @param $secret
     * @param $amount
     * @return mixed
     */
    public function authorise($channelId, $secret, $amount)
    {
        $params = array_filter([
            'channel_id' => $channelId,
            'secret' => $secret,
            'amount' => $amount
        ], 'strlen');

        $response = $this->client->request('POST', '', [
            'json' => [
                'method' => 'channel_authorize',
                'params' => [ $params ]
            ]
        ]);

        return json_decode($response->getBody(), true);
    }

    /**
     * @param $amount
     * @param $channelId
     * @param $publicKey
     * @param $signature
     * @return mixed
     */
    public function verify($amount, $channelId, $publicKey, $signature)
    {
        $params = array_filter([
            'amount' => $amount,
            'channel_id' => $channelId,
            'public_key' => $publicKey,
            'signature' => $signature
        ], 'strlen');

        $response = $this->client->request('POST', '', [
            'json' => [
                'method' => 'channel_verify',
                'params' => [ $params ]
            ]
        ]);

        return json_decode($response->getBody(), true);
    }

}