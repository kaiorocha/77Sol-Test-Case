<?php

namespace App\Domain\Interfaces;
use App\Domain\Entities\Project as ProjectEntity;

interface ProjectRepository
{
    public function index(array $request, int $customer_id = null): array;
    public function show(int $id): ProjectEntity;
    public function store(ProjectEntity $project): ProjectEntity;
    public function delete(int $id): bool;
    public function update(ProjectEntity $project, int $id): ProjectEntity;
}
