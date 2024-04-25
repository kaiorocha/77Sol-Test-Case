<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *      title="77Sol - gerenciamento de projetos",
 *      version="1.0",
 *      description="Está documentação fornece os endpoints e detalhes para a integração com o sistema de gertão de projetos da 77Sol."
 *  ),
 * @OA\PathItem(
 *      path="/api/",
 *  ),
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
