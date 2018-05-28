<?php

namespace PhpXrp\Api;


/**
 * Class PaymentPathApi
 * @package PhpXrp\Api
 */
class PaymentPathApi extends BaseApi
{
    /**
     * PaymentPathApi constructor.
     * @param string $uri
     */
    public function __construct($uri = BaseApi::DEFAULT_BASE_URI)
    {
        parent::__construct($uri);
    }

    /**
     * @param $sourceAccount
     * @param $destinationAccount
     * @param $destinationAmount
     * @param null $sendMax
     * @param null $sourceCurrencies
     * @param null $ledgerHash
     * @param null $ledgerIndex
     * @return mixed
     */
    public function getPath($sourceAccount, $destinationAccount, $destinationAmount, $sendMax = null, $sourceCurrencies = null, $ledgerHash = null, $ledgerIndex = null)
    {
        $params = array_filter([
            'source_account' => $sourceAccount,
            'destination_account' => $destinationAccount,
            'destination_amount' => $destinationAmount,
            'send_max' => $sendMax,
            'source_currencies' => $sourceCurrencies,
            'ledger_hash' => $ledgerHash,
            'ledger_index' => $ledgerIndex
        ], 'strlen');

        $response = $this->client->request('POST', '', [
            'json' => [
                'method' => 'ripple_path_find',
                'params' => [$params]
            ]
        ]);

        return json_decode($response->getBody(), true);
    }

}