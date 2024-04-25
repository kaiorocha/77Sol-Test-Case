<?php

namespace App\Domain\UseCases;

use App\Domain\Interfaces\ViewModel;
use App\Domain\Entities\Project as ProjectEntity;

interface Project
{
    public function index(array $request, int $customer_id = null): ViewModel;
    public function show(int $id): ViewModel;
    public function delete(int $id): ViewModel;
    public function store(ProjectEntity $project): ViewModel;
    public function update(ProjectEntity $project, int $id): ViewModel;
}
