<?php

namespace PhpXrp\Api;


/**
 * Class OrderBookApi
 * @package PhpXrp\Api
 */
class OrderBookApi extends BaseApi
{
    /**
     * OrderBookApi constructor.
     * @param string $uri
     */
    public function __construct($uri = BaseApi::DEFAULT_BASE_URI)
    {
        parent::__construct($uri);
    }

    /**
     * @param $takerGets
     * @param $takerPays
     * @param null $ledgerHash
     * @param null $ledgerIndex
     * @param null $taker
     * @param int $limit
     * @param null $marker
     * @return mixed
     */
    public function getOffers($takerGets, $takerPays, $ledgerHash = null, $ledgerIndex = null, $taker = null, $limit = 10, $marker = null)
    {
        $params = array_filter([
            'taker_gets' => $takerGets,
            'taker_pays' => $takerPays,
            'ledger_hash' => $ledgerHash,
            'ledger_index' => $ledgerIndex,
            'taker' => $taker,
            'limit' => $limit,
            'marker' => $marker,
        ], 'strlen');

        $response = $this->client->request('POST', '', [
            'json' => [
                'method' => 'book_offers',
                'params' => [$params]
            ]
        ]);

        return json_decode($response->getBody(), true);
    }

}