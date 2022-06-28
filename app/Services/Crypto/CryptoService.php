<?php

namespace App\Services\Crypto;

use App\Http\Requests\Crypto\ConvertCurrencyRequest;
use App\Models\CryptoConversion;
use Illuminate\Support\Facades\App;

/**
 * Service for working with crypto clients.
 */
class CryptoService
{
    /**
     * @var CryptoClient Crypto Client instance
     */
    private CryptoClient $cryptoClient;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cryptoClient = App::make(config('crypto.client'));
    }

    /**
     * Converts provided currency.
     *
     * @param ConvertCurrencyRequest $request Custom request class
     *
     * @return CryptoExchangeRate|null Returns CryptoExchangeRate object or null on failure
     */
    public function convert(ConvertCurrencyRequest $request): ?CryptoExchangeRate
    {
        $data = $request->validated();

        $conversion = $this->cryptoClient->getExchangeRate($data['amount'], $data['currency'], $data['crypto']);

        if (empty($conversion)) {
            return $conversion;
        }

        $cryptoConversion = new CryptoConversion();

        $cryptoConversion->amount = $conversion->amount;
        $cryptoConversion->currency = $conversion->from;
        $cryptoConversion->crypto = $conversion->to;
        $cryptoConversion->exchange_rate = $conversion->exchangeRate;
        $cryptoConversion->conversion = $conversion->result;

        $cryptoConversion->save();

        return $conversion;
    }
}
