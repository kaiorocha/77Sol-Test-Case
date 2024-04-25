<?php

namespace App\Repositories;

use App\Domain\Entities\Customer as CustomerEntity;
use App\Domain\Interfaces\CustomerRepository as CustomerRepositoryInterface;
use App\Models\Customer as CustomerModel;

class CustomerRepository implements CustomerRepositoryInterface
{
    public function model()
    {
        return app(CustomerModel::class);
    }

    public function index($request): array
    {
        try {
            $customers = array_map(function ($customer) {
                return new CustomerEntity($customer);
            }, $this->model()->all()->toArray());

            return $customers;
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function show(int $id): CustomerEntity
    {
        try {
            return new CustomerEntity(
                $this->model()->findOrFail($id)->toArray()
            );
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function store(CustomerEntity $customer): CustomerEntity
    {
        try {
            $customer = $this->model()->create([
                'name' => $customer->getName(),
                'document' => $customer->getDocument(),
                'emails' => $customer->getEmails(),
                'contact_numbers' => $customer->getContactNumbers(),
            ]);

            return new CustomerEntity(
                $customer->toArray()
            );
        } catch (\Exception $ex) {
            throw new \Exception("Failed to create customer: " . $ex->getMessage());
        }
    }

    public function update(CustomerEntity $customer, int $id): CustomerEntity
    {
        try {
            $result = $this->model()->findOrFail($id);
            $result->name = $customer->getName();
            $result->document = $customer->getDocument();
            $result->emails = $customer->getEmails();
            $result->contact_numbers = $customer->getContactNumbers();

            $result->save();

            return new CustomerEntity(
                $result->toArray()
            );
        } catch (\Exception $ex) {
            return false;
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

    public function findByDocument($document): CustomerEntity
    {
        try {
            return new CustomerEntity(
                $this->model()->where('document', $document)->firstOrFail()->toArray()
            );
        } catch (\Exception $ex) {
            throw new \Exception("Failed to find customer by document: " . $ex->getMessage());
        }
    }

    public function exists(string $document): bool
    {
        try {
            return $this->model()
                ->where('document', $document)
                ->exists();
        } catch (\Exception $ex) {
            throw new \Exception("Failed to retrieve existing document: " . $ex->getMessage());
        }
    }


}
