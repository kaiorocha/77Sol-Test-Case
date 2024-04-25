<?php

namespace App\Repositories;

use App\Domain\Entities\Project as ProjectEntity;
use App\Domain\Interfaces\ProjectRepository as ProjectRepositoryInterface;
use App\Models\Project as ProjectModel;

class ProjectRepository implements ProjectRepositoryInterface
{
    public function __construct(
        \App\Domain\Interfaces\CustomerRepository $customerRepository,
    )
    {
        $this->customerRepository = $customerRepository;
    }

    public function model()
    {
        return app(ProjectModel::class);
    }

    public function index(array $request, int $customer_id = null): array
    {
        try {
            $allProjects = $customer_id
                ? $this->model()->where('customer_id', $customer_id)->get()->toArray()
                : $this->model()->all()->toArray();

            $projects = array_map(function ($project) {
                $project = new ProjectEntity($project);
                $project->setCustomer(
                    $this->customerRepository->model()
                        ->find($project->getCustomerId())
                        ->toArray()
                );
                return $project;
            }, $allProjects);

            return $projects;
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function show(int $id): ProjectEntity
    {
        try {
            $project = new ProjectEntity(
                $this->model()->findOrFail($id)->toArray()
            );
            $project->setCustomer(
                $this->customerRepository->model()
                    ->find($project->getCustomerId())
                    ->toArray()
            );
            return $project;
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function store(ProjectEntity $project): ProjectEntity
    {
        try {
            $customer = $this->customerRepository->findByDocument(
                $project->customer_document
            );

            $project = $this->model()->create([
                'description' => $project->getDescription(),
                'state' => $project->getState(),
                'installation_type' => $project->getInstallationType(),
                'equipments' => $project->getEquipments(),
                'customer_id' => $customer->getId()
            ]);
;
            $project =  new ProjectEntity(
                $project->toArray()
            );

            $project->setCustomer($customer->toArray());

            return $project;

        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    public function delete(int $id): bool
    {
        try {
            $this->model()->findOrFail($id)->delete();
            return true;
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function update(ProjectEntity $project, int $id): ProjectEntity
    {
        try {
            $customer = $this->customerRepository->findByDocument(
                $project->customer_document
            );

            $result = $this->model()->findOrFail($id);
            $result->description = $project->getDescription();
            $result->state = $project->getState();
            $result->equipments = $project->getEquipments();
            $result->customer_id = $customer->getId();

            $result->save();
            ;
            $project =  new ProjectEntity(
                $result->toArray()
            );

            $project->setCustomer($customer->toArray());

            return $project;

        } catch (\Exception $ex) {
            return false;
        }
    }


}
