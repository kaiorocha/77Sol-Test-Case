<?php

namespace App\Http\Controllers\Customer;

use App\Domain\Entities\Customer;
use App\Http\Controllers\CustomerController;
use App\Http\Requests\Customer\StoreRequest;

class Store extends CustomerController
{
    /**
     *
     * @OA\Post(
     *     tags={"Clientes"},
     *     summary="Cadastrar cliente",
     *     description="Cadastrar Cliente",
     *     path="/api/customers",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *             mediaType="multipart/formdata",
     *             @OA\Schema(
     *                 type="object",
     *                 required={"name", "document"},
     *                 @OA\Property(property="name",type="text"),
     *                 @OA\Property(property="document",type="text"),
     *                 @OA\Property(property="emails",type="text"),
     *                 @OA\Property(property="contact_numbers",type="text")
     *             )
     *         )
     *     ),
     *     @OA\Response(response=201, description="Cadastra um novo cliente")
     * ),
     */
    public function __invoke(StoreRequest $request)
    {
        $viewModel = $this->service->store(
            new Customer(request()->all())
        );

        return $viewModel->getResource();
    }
}
