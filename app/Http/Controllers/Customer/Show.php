<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\CustomerController;

class Show extends CustomerController
{
    /**
     *
     * @OA\Get(
     *     tags={"Clientes"},
     *     summary="Retorna um cliente cadastrado",
     *     description="Retorna um cliente cadastrado",
     *     path="/api/customers/{id}",
     *     @OA\Response(response=200, description="Retorna um cliente pelo ID")
     * ),
     */
    public function __invoke(int $id)
    {
        $viewModel = $this->service->show($id);

        return $viewModel->getResource();
    }
}
