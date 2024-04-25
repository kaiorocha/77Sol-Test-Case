<?php

namespace App\Http\Resources\Project;

use App\Http\Resources\JsonResource;

class ShowResource extends JsonResource
{
    public function toArray($request)
    {
        return $this->resource->toArray();
    }
}
