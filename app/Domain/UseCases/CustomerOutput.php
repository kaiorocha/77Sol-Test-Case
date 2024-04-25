<?php

namespace App\Domain\UseCases;

use App\Domain\Interfaces\ViewModel;
use \App\Domain\Entities\Customer as CustomerEntity;

/**
 * Customer Output
 */
interface CustomerOutput
{
    /**
     * @param CustomerEntity[] $customer
     * @return ViewModel
     */
    public function customerIndex(array $customer): ViewModel;

    /**
     * @param CustomerEntity $customer
     * @return ViewModel
     */
    public function customerShow(CustomerEntity $customer): ViewModel;

    public function customerCreated(CustomerEntity $customer): ViewModel;
    public function customerUpdated(CustomerEntity $customer): ViewModel;
    public function customerDeleted(): ViewModel;
    public function error(string $message, int $statusCode): ViewModel;
}
