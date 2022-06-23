<?php

namespace App\Services\Crypto;

/**
 * Exchange rate object.
 */
class CryptoExchangeRate
{
    /**
     * @var string Currency type (EUR, USD, PLN and etc.)
     */
    public string $from;

    /**
     * @var string Crypto type (ETH, BTC and etc.)
     */
    public string $to;

    /**
     * @var string Amount of currency being converted
     */
    public string $amount;

    /**
     * @var float|null Crypto exchange rate
     */
    public ?float $exchangeRate = null;

    /**
     * @var float|null Conversion result
     */
    public ?float $result = null;

    /**
     * Exchange rate constructor.
     *
     * @param string $from Currency type (EUR, USD, PLN and etc.)
     * @param string $to Crypto type (ETH, BTC and etc.)
     * @param float $amount Amount of currency being converted
     */
    public function __construct(string $from, string $to, float $amount)
    {
        $this->from = $from;
        $this->to = $to;
        $this->amount = $amount;
    }
}
