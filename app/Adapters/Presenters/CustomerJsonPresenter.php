<?php

namespace App\Adapters\Presenters;

use App\Adapters\ViewModel\JsonResourceViewModel;
use App\Domain\Entities\Customer;
use App\Domain\Interfaces\ViewModel;
use App\Domain\UseCases\CustomerOutput;
use App\Http\Resources\BadRequestResource;
use App\Http\Resources\Customer\DeleteResource;
use App\Http\Resources\Customer\IndexResource;
use App\Http\Resources\Customer\ShowResource;
use App\Http\Resources\Customer\StoreResource;
use App\Http\Resources\Customer\UpdateResource;

class CustomerJsonPresenter implements CustomerOutput
{
    public function customerIndex(array $customers): ViewModel
    {
        return new JsonResourceViewModel(
            new IndexResource($customers)
        );
    }
    public function customerShow(Customer $customer): ViewModel
    {
        return new JsonResourceViewModel(
            new ShowResource($customer)
        );
    }

    public function customerCreated(Customer $customer): ViewModel
    {
        return new JsonResourceViewModel(
            new StoreResource($customer, 201)
        );
    }

    public function customerUpdated(Customer $customer): ViewModel
    {
        return new JsonResourceViewModel(
            new UpdateResource($customer)
        );
    }

    public function customerDeleted(): ViewModel
    {
        return new JsonResourceViewModel(
            new DeleteResource([])
        );
    }

    public function error(string $message, int $statusCode = 400): ViewModel
    {
        $jsonResource = new BadRequestResource([], $statusCode);
        $jsonResource->setMessage($message);
        return new JsonResourceViewModel($jsonResource);
    }

}
