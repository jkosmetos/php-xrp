<?php

namespace PhpXrp\Api;

/**
 * Class AccountApi
 * @package PhpXrp\Api
 */
class AccountApi extends BaseApi
{
    /**
     * AccountApi constructor.
     * @param string $uri
     */
    public function __construct($uri = BaseApi::DEFAULT_BASE_URI)
    {
        parent::__construct($uri);
    }

    /**
     * @param $account
     * @param bool $strict
     * @param null $ledgerHash
     * @param null $ledgerIndex
     * @return mixed
     */
    public function getCurrencies($account, $strict = false, $ledgerHash = null, $ledgerIndex = null)
    {
        $params = array_filter([
            'account' => $account,
            'strict' => $strict,
            'ledger_hash' => $ledgerHash,
            'ledger_index' => $ledgerIndex,
        ], 'strlen');

        $response = $this->client->request('POST', '', [
            'json' => [
                'method' => 'account_currencies',
                'params' => [ $params ]
            ]
        ]);

        return json_decode($response->getBody(), true);
    }

    /**
     * @param $account
     * @param null $destinationAccount
     * @param null $ledgerHash
     * @param null $ledgerIndex
     * @param int $limit
     * @param null $marker
     * @return mixed
     */
    public function getChannels($account, $destinationAccount = null, $ledgerHash = null, $ledgerIndex = null, $limit = 200, $marker = null)
    {
        $params = array_filter([
            'account' => $account,
            'destination_account' => $destinationAccount,
            'ledger_hash' => $ledgerHash,
            'ledger_index' => $ledgerIndex,
            'limit' => $limit,
            'marker' => $marker
        ], 'strlen');

        $response = $this->client->request('POST', '', [
            'json' => [
                'method' => 'account_channels',
                'params' => [ $params ]
            ]
        ]);

        return json_decode($response->getBody(), true);
    }

    /**
     * @param $account
     * @param bool $strict
     * @param null $ledgerHash
     * @param null $ledgerIndex
     * @param bool $queue
     * @param bool $signerLists
     * @return mixed
     */
    public function getInfo($account, $strict = false, $ledgerHash = null, $ledgerIndex = null, $queue = false, $signerLists = false)
    {
        $params = array_filter([
            'account' => $account,
            'strict' => $strict,
            'ledger_hash' => $ledgerHash,
            'ledger_index' => $ledgerIndex,
            'queue' => $queue,
            'signer_lists' => $signerLists
        ], 'strlen');

        $response = $this->client->request('POST', '', [
            'json' => [
                'method' => 'account_info',
                'params' => [ $params ]
            ]
        ]);

        return json_decode($response->getBody(), true);
    }

    /**
     * @param $account
     * @param null $ledgerHash
     * @param null $ledgerIndex
     * @param null $peer
     * @param int $limit
     * @param null $marker
     * @return mixed
     */
    public function getTrustLines($account, $ledgerHash = null, $ledgerIndex = null, $peer = null, $limit = 200, $marker = null)
    {
        $params = array_filter([
            'account' => $account,
            'ledger_hash' => $ledgerHash,
            'ledger_index' => $ledgerIndex,
            'peer' => $peer,
            'limit' => $limit,
            'marker' => $marker
        ], 'strlen');

        $response = $this->client->request('POST', '', [
            'json' => [
                'method' => 'account_lines',
                'params' => [ $params ]
            ]
        ]);

        return json_decode($response->getBody(), true);
    }

    /**
     * @param $account
     * @param array $hotWallet
     * @param bool $strict
     * @param null $ledgerHash
     * @param null $ledgerIndex
     * @return mixed
     */
    public function getObjects($account, array $hotWallet, $strict = false, $ledgerHash = null, $ledgerIndex = null)
    {
        $params = array_filter([
            'account' => $account,
            'hotwallet' => $hotWallet,
            'strict' => $strict,
            'ledger_hash' => $ledgerHash,
            'ledger_index' => $ledgerIndex
        ], 'strlen');

        $response = $this->client->request('POST', '', [
            'json' => [
                'method' => 'account_objects',
                'params' => [ $params ]
            ]
        ]);

        return json_decode($response->getBody(), true);
    }

    /**
     * @param $account
     * @param null $ledgerHash
     * @param null $ledgerIndex
     * @param int $limit
     * @param null $marker
     * @return mixed
     */
    public function getOffers($account, $ledgerHash = null, $ledgerIndex = null, $limit = 200, $marker = null)
    {
        $params = array_filter([
            'account' => $account,
            'ledger_hash' => $ledgerHash,
            'ledger_index' => $ledgerIndex,
            'limit' => $limit,
            'marker' => $marker
        ]);

        $response = $this->client->request('POST', '', [
            'json' => [
                'method' => 'account_offers',
                'params' => [ $params ]
            ]
        ]);

        return json_decode($response->getBody(), true);
    }

    /**
     * @param $account
     * @param int $ledgerIndexMin
     * @param int $ledgerIndexMax
     * @param null $ledgerHash
     * @param null $ledgerIndex
     * @param bool $binary
     * @param bool $forward
     * @param int $limit
     * @param null $marker
     * @return mixed
     */
    public function getTransactions($account, $ledgerIndexMin = -1, $ledgerIndexMax = -1, $ledgerHash = null, $ledgerIndex = null, $binary = false, $forward = false, $limit = 200, $marker = null)
    {
        $params = array_filter([
            'account' => $account,
            'ledger_index_min' => $ledgerIndexMin,
            'ledger_index_max' => $ledgerIndexMax,
            'ledger_hash' => $ledgerHash,
            'ledger_index' => $ledgerIndex,
            'binary' => $binary,
            'forward' => $forward,
            'limit' => $limit,
            'marker' => $marker
        ], 'strlen');

        $response = $this->client->request('POST', '', [
            'json' => [
                'method' => 'account_tx',
                'params' => [ $params ]
            ]
        ]);

        return json_decode($response->getBody(), true);
    }

    /**
     * @param $account
     * @param array $hotWallet
     * @param bool $strict
     * @param null $ledgerHash
     * @param null $ledgerIndex
     * @return mixed
     */
    public function getGatewayBalances($account, array $hotWallet, $strict = false, $ledgerHash = null, $ledgerIndex = null)
    {
        $params = array_filter([
            'account' => $account,
            'hotwallet' => $hotWallet,
            'strict' => $strict,
            'ledger_hash' => $ledgerHash,
            'ledger_index' => $ledgerIndex
        ], 'strlen');

        $response = $this->client->request('POST', '', [
            'json' => [
                'method' => 'gateway_balances',
                'params' => [ $params ]
            ]
        ]);

        return json_decode($response->getBody(), true);
    }

    /**
     * @param $account
     * @param $role
     * @param bool $transactions
     * @param null $ledgerHash
     * @param null $ledgerIndex
     * @param int $limit
     * @return mixed
     */
    public function doNoRippleCheck($account, $role, $transactions = false, $ledgerHash = null, $ledgerIndex = null, $limit = 10)
    {
        $params = array_filter([
            'account' => $account,
            'role' => $role,
            'transactions' => $transactions,
            'limit' => $limit,
            'ledger_hash' => $ledgerHash,
            'ledger_index' => $ledgerIndex,
        ], 'strlen');

        $response = $this->client->request('POST', '', [
            'json' => [
                'method' => 'noripple_check',
                'params' => [ $params ]
            ]
        ]);

        return json_decode($response->getBody(), true);
    }

}