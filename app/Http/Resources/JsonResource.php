<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource as JsonResourceBase;
use Illuminate\Http\Resources\Json\ResourceResponse;

class JsonResource extends JsonResourceBase
{
    public function __construct($resource, $statusCode = 200)
    {
        parent::__construct($resource);
        $this->statusCode = $statusCode;
    }

    public function toResponse($request)
    {
        return (new ResourceResponse($this))->toResponse($request)->setStatusCode($this->statusCode);
    }
}
