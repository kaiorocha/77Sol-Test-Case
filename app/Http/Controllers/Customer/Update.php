<?php

namespace App\Http\Controllers\Customer;

use App\Domain\Entities\Customer;
use App\Http\Controllers\CustomerController;

class Update extends CustomerController
{
    /**
     *
     * @OA\Put(
     *     tags={"Clientes"},
     *     summary="Editar cliente",
     *     description="Editar Cliente",
     *     path="/api/customers/{id}",
     *      @OA\RequestBody(
     *          @OA\JsonContent(),
     *          @OA\MediaType(
     *              mediaType="multipart/formdata",
     *              @OA\Schema(
     *                  type="object",
     *                  required={"name", "document"},
     *                  @OA\Property(property="name",type="text"),
     *                  @OA\Property(property="emails",type="text"),
     *                  @OA\Property(property="contact_numbers",type="text")
     *              )
     *          )
     *      ),
     *     @OA\Response(response=200, description="Editar um cliente cadastrado")
     * ),
     */
    public function __invoke(int $id)
    {
        $viewModel = $this->service->update(
            new Customer(request()->all()),
            $id
        );

        return $viewModel->getResource();
    }
}
