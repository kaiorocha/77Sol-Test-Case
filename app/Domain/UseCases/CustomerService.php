<?php

namespace App\Domain\UseCases;

use App\Domain\Entities\Customer as CustomerEntity;
use App\Domain\Interfaces\CustomerRepository as CustomerRepository;
use App\Domain\Interfaces\ViewModel;
use App\Http\Resources\Customer\IndexResource;
use App\Http\Resources\Customer\ShowResource;

class CustomerService implements Customer
{
    public function __construct(
        CustomerRepository $repository,
        CustomerOutput $output
    )
    {
        $this->repository = $repository;
        $this->output = $output;
    }

    public function index($request): ViewModel
    {
        $customers = $this->repository->index($request);
        return $this->output->customerIndex($customers);
    }

    public function show(int $id): ViewModel
    {
        $customer = $this->repository->show($id);
        return $this->output->customerShow($customer);
    }

    public function delete(int $id): ViewModel
    {
        $this->repository->delete($id);
        return $this->output->customerDeleted();
    }

    public function store(CustomerEntity $customer): ViewModel
    {
        if ($this->repository->exists($customer->getDocument())) {
            return $this->output->error('Customer already exists!!!', 400);
        }

        $customer = $this->repository->store($customer);
        return $this->output->customerCreated($customer);
    }

    public function update(CustomerEntity $customer, int $id): ViewModel
    {
        $customer = $this->repository->update($customer, $id);
        return $this->output->customerUpdated($customer);
    }


}
