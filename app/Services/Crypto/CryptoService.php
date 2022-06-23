<?php

namespace App\Services\Crypto;

use App\Http\Requests\Crypto\ConvertCurrencyRequest;
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

        return $this->cryptoClient->getExchangeRate($data['amount'], $data['currency'], $data['crypto']);
    }
}
