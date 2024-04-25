<?php

namespace App\Domain\UseCases;

use App\Domain\Interfaces\ViewModel;
use App\Domain\Entities\Project as ProjectEntity;

interface ProjectOutput
{
    /**
     * @param ProjectEntity[] $projects
     * @return ViewModel
     */
    public function projectIndex(array $projects): ViewModel;

    /**
     * @param ProjectEntity $project
     * @return ViewModel
     */
    public function projectShow(ProjectEntity $project): ViewModel;

    public function projectCreated(ProjectEntity $project): ViewModel;
    public function projectUpdated(ProjectEntity $project): ViewModel;
    public function projectDeleted(): ViewModel;
    public function error(string $message, int $statusCode): ViewModel;
}
