<?php

namespace App\Http\Resources\Responses;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Standardised JSON response object.
 */
class JsonResponseResource extends JsonResource
{
    /**
     * @var bool Was operation successful
     */
    private bool $success;

    /**
     * @var string Informational message
     */
    private string $message;

    /**
     * @var mixed|null Response data
     */
    private $data;

    /**
     * Customized constructor for IDE type hinting.
     *
     * @param bool $success Was operation successful
     * @param string $message Informational message
     * @param mixed|null Response data
     */
    public function __construct(bool $success, string $message, $data = null)
    {
        $this->success = $success;
        $this->message = $message;
        $this->data = $data;

        parent::__construct([
            'success' => $this->success,
            'message' => $this->message,
            'data' => $this->data,
        ]);
    }

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'success' => $this->success,
            'message' => $this->message,
            'data' => $this->data,
        ];
    }
}
