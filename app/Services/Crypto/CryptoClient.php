<?php

namespace App\Services\Crypto;

/**
 * Crypto Client interface.
 */
interface CryptoClient
{
    /**
     * Retrieves crypto exchange rate from the crypto client and return normalized crypto exchange rate object.
     *
     * @param float $amount Amount of currency being converted
     * @param string $currency Currency type (EUR, USD, PLN and etc.)
     * @param string $crypto Crypto type (ETH, BTC and etc.)
     *
     * @return CryptoExchangeRate|null Returns CryptoExchangeRate object or null on failure
     */
    public function getExchangeRate(float $amount, string $currency, string $crypto): ?CryptoExchangeRate;
}
