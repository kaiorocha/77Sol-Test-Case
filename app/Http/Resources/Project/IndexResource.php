<?php

namespace App\Http\Resources\Project;

use App\Http\Resources\JsonResource;

class IndexResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'projects' => array_map(function ($project) {
                return $project->toArray();
            }, $this->resource)
        ];
    }
}
