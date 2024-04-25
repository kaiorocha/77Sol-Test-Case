<?php

namespace App\Http\Controllers\Project;

use App\Domain\Entities\Project;
use App\Http\Controllers\ProjectController;

class Update extends ProjectController
{
    /**
     *
     * @OA\Put (
     *     tags={"Projetos"},
     *     summary="Editar Projeto",
     *     description="Editar Projeto",
     *     path="/api/projects",
     *        @OA\RequestBody(
     *            @OA\JsonContent(),
     *            @OA\MediaType(
     *                mediaType="multipart/formdata",
     *                @OA\Schema(
     *                    type="object",
     *                    required={"description", "customer_document"},
     *                    @OA\Property(property="description",type="text"),
     *                    @OA\Property(property="customer_document",type="text"),
     *                    @OA\Property(property="installation_type",type="text"),
     *                    @OA\Property(property="equipments",type="text")
     *                )
     *            )
     *        ),
     *     @OA\Response(response=201, description="Editar projeto")
     * ),
     */
    public function __invoke(int $id)
    {
        $viewModel = $this->service->update(
            new Project(request()->all()),
            $id
        );

        return $viewModel->getResource();
    }
}
