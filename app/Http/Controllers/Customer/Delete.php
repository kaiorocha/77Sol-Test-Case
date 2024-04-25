<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\CustomerController;

class Delete extends CustomerController
{
    /**
     *
     * @OA\Delete(
     *     tags={"Clientes"},
     *     summary="Deleta um cliente cadastrado",
     *     description="Deleta um cliente cadastrado",
     *     path="/api/customers/{id}",
     *     @OA\Response(response=200, description="Deleta um cliente pelo ID")
     * ),
     */
    public function __invoke(int $id)
    {
        $viewModel = $this->service->delete($id);

        return $viewModel->getResource();
    }
}
