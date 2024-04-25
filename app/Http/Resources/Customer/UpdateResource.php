<?php

namespace App\Http\Resources\Customer;

use App\Http\Resources\JsonResource;

class UpdateResource extends JsonResource
{
    public function toArray($request)
    {
        return $this->resource->toArray();
    }
}
