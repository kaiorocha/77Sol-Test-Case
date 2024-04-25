<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\ProjectController;

class Projects extends ProjectController
{
    /**
     *
     * @OA\Get(
     *     tags={"Clientes"},
     *     summary="Retornar clientes cadastrados",
     *     description="Retornar clientes cadastrados",
     *     path="/api/customers/{id}/projects",
     *     @OA\Response(response=200, description="lista de clientes cadastrados")
     * ),
     */
    public function __invoke(int $customer_id = null)
    {
        $viewModel = $this->service->index(
            request()->all(), $customer_id
        );

        return $viewModel->getResource();
    }
}
