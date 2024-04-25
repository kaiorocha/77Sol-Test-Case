<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\ProjectController;

class Show extends ProjectController
{
    /**
     *
     * @OA\Get(
     *     tags={"Projetos"},
     *     summary="Retorna um projeto cadastrado",
     *     description="Retorna um projeto cadastrado",
     *     path="/api/projects/{id}",
     *     @OA\Response(response=200, description="Retorna um projeto pelo ID")
     * ),
     */
    public function __invoke(int $id)
    {
        $viewModel = $this->service->show($id);

        return $viewModel->getResource();
    }
}
