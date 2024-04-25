<?php

namespace App\Http\Controllers\Project;

use App\Domain\Entities\Project;
use App\Http\Controllers\ProjectController;
use App\Http\Requests\Project\StoreRequest;

class Store extends ProjectController
{
    /**
     *
     * @OA\Post(
     *     tags={"Projetos"},
     *     summary="Cadastrar Projeto",
     *     description="Cadastrar Projeto",
     *     path="/api/projects",
     *       @OA\RequestBody(
     *           @OA\JsonContent(),
     *           @OA\MediaType(
     *               mediaType="multipart/formdata",
     *               @OA\Schema(
     *                   type="object",
     *                   required={"description", "customer_document"},
     *                   @OA\Property(property="description",type="text"),
     *                   @OA\Property(property="customer_document",type="text"),
     *                   @OA\Property(property="installation_type",type="text"),
     *                   @OA\Property(property="equipments",type="text")
     *               )
     *           )
     *       ),
     *     @OA\Response(response=201, description="Cadastra um novo projeto")
     * ),
     */
    public function __invoke(StoreRequest $request)
    {
        $viewModel = $this->service->store(
            new Project(request()->all())
        );

        return $viewModel->getResource();
    }
}
