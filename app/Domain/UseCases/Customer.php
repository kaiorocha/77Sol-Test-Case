<?php

namespace App\Domain\UseCases;
use App\Domain\Entities\Customer as CustomerEntity;
use App\Domain\Interfaces\ViewModel;

interface Customer
{
    public function index($request): ViewModel;

    public function show(int $id): ViewModel;

    public function delete(int $id): ViewModel;

    public function store(CustomerEntity $customer): ViewModel;
    public function update(CustomerEntity $customer, int $id): ViewModel;
}
