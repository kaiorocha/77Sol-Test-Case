<?php

namespace App\Http\Controllers;

use App\Domain\UseCases\Project;

class ProjectController
{
    public function __construct(
        protected Project $service
    )
    { }
}
