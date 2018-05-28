<?php

namespace PhpXrp\Api;

/**
 * Class SubscriptionApi
 * @package PhpXrp\Api
 */
class SubscriptionApi extends BaseApi
{
    /**
     * SubscriptionApi constructor.
     * @param string $uri
     */
    public function __construct($uri = BaseApi::DEFAULT_BASE_URI)
    {
        parent::__construct($uri);
    }

    /**
     * @param array|null $streams
     * @param array|null $accounts
     * @param array|null $accountsProposed
     * @param array|null $books
     * @param null $url
     * @param null $urlUsername
     * @param null $urlPassword
     * @return mixed
     */
    public function subscribe(array $streams = null, array $accounts = null, array $accountsProposed = null, array $books = null, $url = null, $urlUsername = null, $urlPassword = null)
    {
        $params = array_filter([
            'streams' => $streams,
            'accounts' => $accounts,
            'accounts_proposed' => $accountsProposed,
            'books' => $books,
            'url' => $url,
            'url_username' => $urlUsername,
            'url_password' => $urlPassword,
        ], 'strlen');

        $response = $this->client->request('POST', '', [
            'json' => [
                'method' => 'subscribe',
                'params' => [ $params ]
            ]
        ]);

        return json_decode($response->getBody(), true);
    }

    /**
     * @param array|null $streams
     * @param array|null $accounts
     * @param array|null $accountsProposed
     * @param array|null $books
     * @return mixed
     */
    public function unSubscribe(array $streams = null, array $accounts = null, array $accountsProposed = null, array $books = null)
    {
        $params = array_filter([
            'streams' => $streams,
            'accounts' => $accounts,
            'accounts_proposed' => $accountsProposed,
            'books' => $books
        ], 'strlen');

        $response = $this->client->request('POST', '', [
            'json' => [
                'method' => 'unsubscribe',
                'params' => [ $params ]
            ]
        ]);

        return json_decode($response->getBody(), true);
    }
}