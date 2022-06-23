<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Crypto\ConvertCurrencyRequest;
use App\Services\Crypto\CryptoService;
use Illuminate\Http\JsonResponse;

/**
 * Controller responsible for handling actions concerning cryptocurrencies.
 */
class CryptoController extends Controller
{
    /**
     * @var CryptoService Crypto Service class
     */
    private CryptoService $cryptoService;

    /**
     * Initializes necessary dependencies.
     *
     * @param CryptoService $cryptoService Crypto Service class
     */
    public function __construct(CryptoService $cryptoService)
    {
        $this->cryptoService = $cryptoService;
    }

    /**
     * Converts provided currency and amount into provided cryptocurrency.
     *
     * @param ConvertCurrencyRequest $request Custom request class
     *
     * @return JsonResponse
     */
    public function convert(ConvertCurrencyRequest $request): JsonResponse
    {
        try {
            return response()->jsonSuccess('OK', $this->cryptoService->convert($request));
        } catch (\Exception $exception) {
            return response()->jsonError($exception->getMessage());
        }
    }
}
