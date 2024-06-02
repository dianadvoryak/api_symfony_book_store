<?php

namespace App\Controller;

use App\Model\ReviewPage;
use App\Service\ReviewService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use OpenApi\Attributes as OA;
use Nelmio\ApiDocBundle\Annotation\Model;

class ReviewController extends AbstractController
{
    public function __construct(private ReviewService $reviewService)
    {
    }

    #[Route('/api/v1/book/{id}/reviews', methods: ['GET'])]
    #[OA\Parameter(name: 'page', description: 'Page number', in: 'query', schema: new OA\Schema(type: 'integer'))]
    #[OA\Response(response: 200, description: 'Returns page of reviews for the given book', attachables: [new Model(type: ReviewPage::class)])]
    public function reviews(int $id, Request $request): Response
    {
        return $this->json($this->reviewService->getReviewPageByBookId(
            $id, $request->query->get('page', 1)
        ));
    }
}
