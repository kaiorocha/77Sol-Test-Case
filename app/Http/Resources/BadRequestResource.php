<?php

namespace App\Http\Resources;

class BadRequestResource extends JsonResource
{
    private $message;

    public function __construct($resource, $statusCode = 200)
    {
        parent::__construct($resource, $statusCode);
    }

    public function toArray($request)
    {
        return [
            'error' => [
                'statusCode' => $this->statusCode,
                'message'=> $this->getMessage()
            ]
        ];
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message): void
    {
        $this->message = $message;
    }
}
