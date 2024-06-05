<?php

namespace App\Controller;

use App\Model\ErrorResponse;
use App\Service\RoleService;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    public function __construct(private RoleService $roleService)
    {
    }

    #[Route(path: '/api/v1/admin/grantAuthor/{userId}', methods: ['POST'])]
    #[OA\Tag(name: 'Admin API')]
    #[OA\Response(response: 200, description: 'Grants ROLE_AUTHOR to a user')]
    #[OA\Response(response: 404, description: 'User not found', attachables: [new Model(type: ErrorResponse::class)])]
    public function grantAuthor(int $userId): Response
    {
        $this->roleService->grantAuthor($userId);

        return $this->json(null);
    }
}
