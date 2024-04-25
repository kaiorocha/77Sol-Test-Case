<?php

namespace App\Http\Resources\Customer;

use App\Http\Resources\JsonResource;

class IndexResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'customers' => array_map(function ($customer) {
                return $customer->toArray();
            }, $this->resource)
        ];
    }
}
