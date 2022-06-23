<?php

namespace App\Services\Crypto;

use GuzzleHttp\Client;

/**
 * Exchangerate Crypto Client.
 *
 * @link https://exchangerate.host/#/#docs
 */
class ExchangerateCryptoClient implements CryptoClient
{
    /**
     * @inheritDoc
     */
    public function getExchangeRate(float $amount, string $currency, string $crypto): ?CryptoExchangeRate
    {
        $client = new Client();

        $response = $client->request('GET', 'https://api.exchangerate.host/convert', [
            'query' => [
                'from' => $currency,
                'to' => $crypto,
                'amount' => $amount,
                'source' => 'crypto',
            ],
        ]);

        $data = json_decode($response->getBody()->getContents());

        // TODO Implement error handling

        if (empty($data)) {
            return null;
        }

        $rate = new CryptoExchangeRate($currency, $crypto, $amount);

        $rate->exchangeRate = $data->info->rate;
        $rate->result = $data->result;

        return $rate;
    }
}
