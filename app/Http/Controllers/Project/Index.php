<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\ProjectController;

class Index extends ProjectController
{
    /**
     *
     * @OA\Get(
     *     tags={"Projetos"},
     *     summary="Retornar projetos cadastrados",
     *     description="Retornar projetos cadastrados",
     *     path="/api/projects",
     *     @OA\Response(response=200, description="lista de projetos cadastrados")
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
