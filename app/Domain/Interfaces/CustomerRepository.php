<?php

namespace App\Domain\Interfaces;
use App\Domain\Entities\Customer as CustomerEntity;

interface CustomerRepository
{
    public function index($request): array;
    public function show(int $id): CustomerEntity;
    public function store(CustomerEntity $customer): CustomerEntity;
    public function delete(int $id): bool;
    public function findByDocument(string $document): CustomerEntity;
    public function exists(string $document): bool;
    public function update(CustomerEntity $customer, int $id): CustomerEntity;
    public function isActive(int $id): bool;
}
