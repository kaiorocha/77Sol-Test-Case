<?php

namespace App\Adapters\Presenters;

use App\Adapters\ViewModel\JsonResourceViewModel;
use App\Domain\Entities\Project as ProjectEntity;
use App\Domain\Interfaces\ViewModel;
use App\Domain\UseCases\ProjectOutput;
use App\Http\Resources\BadRequestResource;
use App\Http\Resources\Project\DeleteResource;
use App\Http\Resources\Project\IndexResource;
use App\Http\Resources\Project\ShowResource;
use App\Http\Resources\Project\StoreResource;
use App\Http\Resources\Project\UpdateResource;

class ProjectJsonPresenter implements ProjectOutput
{
    public function projectIndex(array $projects): ViewModel
    {
        return new JsonResourceViewModel(
            new IndexResource($projects)
        );
    }

    public function projectShow(ProjectEntity $project): ViewModel
    {
        return new JsonResourceViewModel(
            new ShowResource($project)
        );
    }

    public function projectCreated(ProjectEntity $project): ViewModel
    {
        return new JsonResourceViewModel(
            new StoreResource($project, 201)
        );
    }

    public function projectUpdated(ProjectEntity $project): ViewModel
    {
        return new JsonResourceViewModel(
            new UpdateResource($project)
        );
    }

    public function projectDeleted(): ViewModel
    {
        return new JsonResourceViewModel(
            new DeleteResource([])
        );
    }

    public function error(string $message, int $statusCode): ViewModel
    {
        $jsonResource = new BadRequestResource([], $statusCode);
        $jsonResource->setMessage($message);
        return new JsonResourceViewModel($jsonResource);
    }


}
