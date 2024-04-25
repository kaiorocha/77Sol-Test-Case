<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\ProjectController;

class Delete extends ProjectController
{
    /**
     *
     * @OA\Delete(
     *     tags={"Projetos"},
     *     summary="Deleta um projeto cadastrado",
     *     description="Deleta um projeto cadastrado",
     *     path="/api/projects/{id}",
     *     @OA\Response(response=200, description="Deleta um projeto pelo ID")
     * ),
     */
    public function __invoke(int $id)
    {
        $viewModel = $this->service->delete($id);

        return $viewModel->getResource();
    }
}
