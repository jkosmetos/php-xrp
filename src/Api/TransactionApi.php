<?php

namespace PhpXrp\Api;


/**
 * Class TransactionApi
 * @package PhpXrp\Api
 */
class TransactionApi extends BaseApi
{
    /**
     * TransactionApi constructor.
     * @param string $uri
     */
    public function __construct($uri = BaseApi::DEFAULT_BASE_URI)
    {
        parent::__construct($uri);
    }

    /**
     * @param null $transaction
     * @param null $secret
     * @param null $seed
     * @param null $seedHex
     * @param null $passPhrase
     * @param null $keyType
     * @param bool $offline
     * @param null $buildPath
     * @param int $feeMultMax
     * @param int $feeDivMax
     * @return mixed
     */
    public function sign($transaction = null, $secret = null, $seed = null, $seedHex = null, $passPhrase = null, $keyType = null, $offline = false, $buildPath = null, $feeMultMax = 10, $feeDivMax = 1)
    {

        $params = array_filter([
            'tx_json' => $transaction,
            'secret' => $secret,
            'seed' => $seed,
            'seed_hex' => $seedHex,
            'passphrase' => $passPhrase,
            'key_type' => $keyType,
            'offline' => $offline,
            'build_path' => $buildPath,
            'fee_mult_max' => $feeMultMax,
            'fee_div_max' => $feeDivMax,
        ], 'strlen');

        $response = $this->client->request('POST', '', [
            'json' => [
                'method' => 'sign',
                'params' => [ $params ]
            ]
        ]);

        return json_decode($response->getBody(), true);
    }

    /**
     * @param null $account
     * @param null $transaction
     * @param null $secret
     * @param null $passPhrase
     * @param null $seed
     * @param null $seedHex
     * @param null $keyType
     * @return mixed
     */
    public function signFor($account = null, $transaction = null, $secret = null, $passPhrase = null, $seed = null, $seedHex = null, $keyType = null)
    {

        $params = array_filter([
            'account' => $account,
            'tx_json' => $transaction,
            'secret' => $secret,
            'passphrase' => $passPhrase,
            'seed' => $seed,
            'seed_hex' => $seedHex,
            'key_type' => $keyType
        ], 'strlen');

        $response = $this->client->request('POST', '', [
            'json' => [
                'method' => 'sign_for',
                'params' => [ $params ]
            ]
        ]);

        return json_decode($response->getBody(), true);
    }

    /**
     * @param null $transaction
     * @param null $secret
     * @param null $seed
     * @param null $seedHex
     * @param null $passPhrase
     * @param null $keyType
     * @param bool $failHard
     * @param bool $offline
     * @param null $buildPath
     * @param int $feeMultMax
     * @param int $feeDivMax
     * @return mixed
     */
    public function signAndSubmit($transaction = null, $secret = null, $seed = null, $seedHex = null, $passPhrase = null, $keyType = null, $failHard = false, $offline = false, $buildPath = null, $feeMultMax = 10, $feeDivMax = 1)
    {

        $params = array_filter([
            'tx_json' => $transaction,
            'secret' => $secret,
            'seed' => $seed,
            'seed_hex' => $seedHex,
            'passphrase' => $passPhrase,
            'key_type' => $keyType,
            'fail_hard' => $failHard,
            'offline' => $offline,
            'build_path' => $buildPath,
            'fee_mult_max' => $feeMultMax,
            'fee_div_max' => $feeDivMax,
        ], 'strlen');

        $response = $this->client->request('POST', '', [
            'json' => [
                'method' => 'sign',
                'params' => [ $params ]
            ]
        ]);

        return json_decode($response->getBody(), true);
    }

    /**
     * @param $transactionBlob
     * @param bool $failHard
     * @return mixed
     */
    public function submit($transactionBlob, $failHard = false)
    {
        $params = array_filter([
            'tx_blob' => $transactionBlob,
            'fail_hard' => $failHard
        ], 'strlen');

        $response = $this->client->request('POST', '', [
            'json' => [
                'method' => 'submit',
                'params' => [ $params ]
            ]
        ]);

        return json_decode($response->getBody(), true);
    }

    /**
     * @param $transaction
     * @param bool $failHard
     * @return mixed
     */
    public function submitMultiSigned($transaction, $failHard = false)
    {
        $params = array_filter([
            'tx_json' => $transaction,
            'fail_hard' => $failHard
        ], 'strlen');

        $response = $this->client->request('POST', '', [
            'json' => [
                'method' => 'submit',
                'params' => [ $params ]
            ]
        ]);

        return json_decode($response->getBody(), true);
    }

    /**
     * @param $transactionHash
     * @param null $ledgerHash
     * @param null $ledgerIndex
     * @return mixed
     */
    public function getTransactionEntry($transactionHash, $ledgerHash = null, $ledgerIndex = null)
    {
        $params = array_filter([
            'ledger_hash' => $ledgerHash,
            'ledger_index' => $ledgerIndex,
            'transaction_hash' => $transactionHash
        ], 'strlen');

        $response = $this->client->request('POST', '', [
            'json' => [
                'method' => 'transaction_entry',
                'params' => [ $params ]
            ]
        ]);

        return json_decode($response->getBody(), true);
    }

    /**
     * @param $transactionHash
     * @param bool $binary
     * @return mixed
     */
    public function getTransactionInfo($transactionHash, $binary = false)
    {
        $params = array_filter([
            'transaction' => $transactionHash,
            'binary' => $binary
        ], 'strlen');

        $response = $this->client->request('POST', '', [
            'json' => [
                'method' => 'tx',
                'params' => [ $params ]
            ]
        ]);

        return json_decode($response->getBody(), true);
    }

}