<?php

namespace PhpXrp\Api;

/**
 * Class LedgerApi
 * @package PhpXrp\Api
 */
class LedgerApi extends BaseApi
{
    /**
     * LedgerApi constructor.
     * @param string $uri
     */
    public function __construct($uri = BaseApi::DEFAULT_BASE_URI)
    {
        parent::__construct($uri);
    }

    /**
     * @param null $ledgerHash
     * @param null $ledgerIndex
     * @param bool $full
     * @param bool $accounts
     * @param bool $transactions
     * @param bool $expand
     * @param bool $ownerFunds
     * @param bool $binary
     * @param bool $queue
     * @return mixed
     */
    public function getLedger($ledgerHash = null, $ledgerIndex = null, $full = false, $accounts = false, $transactions = false, $expand = false, $ownerFunds = false, $binary = false, $queue = false)
    {

        $params = array_filter([
            'ledger_hash' => $ledgerHash,
            'ledger_index' => $ledgerIndex,
            'full' => $full,
            'accounts' => $accounts,
            'transactions' => $transactions,
            'expand' => $expand,
            'owner_funds' => $ownerFunds,
            'binary' => $binary,
            'queue' => $queue
        ], 'strlen');

        $response = $this->client->request('POST', '', [
            'json' => [
                'method' => 'ledger',
                'params' => [ $params ]
            ]
        ]);

        return json_decode($response->getBody(), true);
    }

    /**
     * @return mixed
     */
    public function getClosedLedger()
    {

        $response = $this->client->request('POST', '', [
            'json' => [
                'method' => 'ledger_closed',
                'params' => []
            ]
        ]);

        return json_decode($response->getBody(), true);
    }

    /**
     * @return mixed
     */
    public function getCurrentLedger()
    {
        $response = $this->client->request('POST', '', [
            'json' => [
                'method' => 'ledger_current',
                'params' => []
            ]
        ]);

        return json_decode($response->getBody(), true);
    }

    /**
     * @param null $ledgerHash
     * @param null $ledgerIndex
     * @param bool $binary
     * @param int $limit
     * @param null $marker
     * @return mixed
     */
    public function getLedgerData($ledgerHash = null, $ledgerIndex = null, $binary = false, $limit = 5, $marker = null)
    {

        $params = array_filter([
            'ledger_hash' => $ledgerHash,
            'ledger_index' => $ledgerIndex,
            'binary' => $binary,
            'limit' => $limit,
            'marker' => $marker
        ], 'strlen');

        $response = $this->client->request('POST', '', [
            'json' => [
                'method' => 'ledger_data',
                'params' => [ $params ]
            ]
        ]);

        return json_decode($response->getBody(), true);
    }

    /**
     * @param null $index
     * @param null $accountRoot
     * @param null $directory
     * @param null $directorySubIndex
     * @param null $directoryRoot
     * @param null $directoryOwner
     * @param null $offer
     * @param null $offerAccount
     * @param null $offerSequence
     * @param null $rippleState
     * @param null $rippleStateAccounts
     * @param null $rippleStateCurrency
     * @param bool $binary
     * @param null $ledgerHash
     * @param null $ledgerIndex
     * @return mixed
     */
    public function getLedgerEntry($index = null, $accountRoot = null, $directory = null, $directorySubIndex = null, $directoryRoot = null, $directoryOwner = null, $offer = null, $offerAccount = null, $offerSequence = null, $rippleState = null, $rippleStateAccounts = null, $rippleStateCurrency = null, $binary = false, $ledgerHash = null, $ledgerIndex = null)
    {

        $params = array_filter([
            'index' => $index,
            'account_root' => $accountRoot,

            'directory' => $directory,
            'directory.sub_index' => $directorySubIndex,
            'directory.dir_root' => $directoryRoot,
            'directory.owner' => $directoryOwner,

            'offer' => $offer,
            'offer.account' => $offerAccount,
            'offer.seq' => $offerSequence,

            'ripple_state' => $rippleState,
            'ripple_state.accounts' => $rippleStateAccounts,
            'ripple_state.currency' => $rippleStateCurrency,

            'binary' => $binary,
            'ledger_hash' => $ledgerHash,
            'ledger_index' => $ledgerIndex,
        ], 'strlen');

        $response = $this->client->request('POST', '', [
            'json' => [
                'method' => 'ledger_entry',
                'params' => [ $params ]
            ]
        ]);

        return json_decode($response->getBody(), true);
    }

}