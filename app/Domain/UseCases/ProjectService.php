<?php

namespace App\Domain\UseCases;

use App\Domain\Entities\Project as ProjectEntity;
use App\Domain\Interfaces\ProjectRepository;
use App\Domain\Interfaces\CustomerRepository;
use App\Domain\Interfaces\ViewModel;

class ProjectService implements Project
{
    public function __construct(
        ProjectRepository $repository,
        CustomerRepository $customerRepository,
        ProjectOutput $output
    )
    {
        $this->repository = $repository;
        $this->customerRepository = $customerRepository;
        $this->output = $output;
    }

    public function index(array $request, int $customer_id = null): ViewModel
    {
        $projects = $this->repository->index($request, $customer_id);
        return $this->output->projectIndex($projects);
    }

    public function show(int $id): ViewModel
    {
        $project = $this->repository->show($id);
        return $this->output->projectShow($project);
    }

    public function delete(int $id): ViewModel
    {
        $this->repository->delete($id);
        return $this->output->projectDeleted();
    }

    public function store(ProjectEntity $project): ViewModel
    {
        if (!$this->customerRepository->exists($project->customer_document)){
            return $this->output->error("Customer Not Found!!!", 400);
        }

        $project = $this->repository->store($project);
        return $this->output->projectCreated($project);
    }

    public function update(ProjectEntity $project, int $id): ViewModel
    {
        $project = $this->repository->update($project, $id);
        return $this->output->projectUpdated($project);
    }

}
