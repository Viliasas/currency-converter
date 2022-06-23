<?php

namespace App\Providers;

use App\Http\Resources\Responses\JsonResponseResource;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\HttpFoundation\Response as ResponseStatuses;

/**
 * Service provider which registers different JSON responses.
 */
class ResponseMacroServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        ResponseFactory::macro('jsonSuccess', function (
            string $message = 'OK',
            $data = null,
            int $code = ResponseStatuses::HTTP_OK
        ) {
            return response()->json(new JsonResponseResource(true, $message, $data), $code);
        });

        ResponseFactory::macro('jsonError', function (
            string $message = 'ERROR',
            $data = null,
            int $code = ResponseStatuses::HTTP_BAD_REQUEST
        ) {
            return response()->json(new JsonResponseResource(false, $message, $data), $code);
        });
    }
}
