<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\CustomerController;

class Index extends CustomerController
{
    /**
     *
     * @OA\Get(
     *     tags={"Clientes"},
     *     summary="Retornar clientes cadastrados",
     *     description="Retornar clientes cadastrados",
     *     path="/api/customers",
     *     @OA\Response(response=200, description="lista de clientes cadastrados")
     * ),
     */
    public function __invoke()
    {
        $viewModel = $this->service->index(request()->all());

        return $viewModel->getResource();
    }
}
