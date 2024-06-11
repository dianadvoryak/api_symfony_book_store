<?php

namespace App\Controller;

use App\Model\BookListResponse;
use App\Model\ErrorResponse;
use App\Service\BookService;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{
    public function __construct(private BookService $bookService)
    {
    }

    #[Route(path: '/api/v1/category/{id}/books', methods: ['GET'])]
    #[OA\Response(response: 200, description: 'Returns published books inside a category', attachables: [new Model(type: BookListResponse::class)])]
    #[OA\Response(response: 404, description: 'book category not found', attachables: [new Model(type: ErrorResponse::class)])]
    public function booksByCategory(int $id): Response
    {
        return $this->json($this->bookService->getBooksByCategory($id));
    }

    /**
     * @OA\Response(
     *     response=200,
     *     description="Returns book detail information",
     *     @Model(type=AuthorBookDetails::class)
     * )
     * @OA\Response(
     *      response=404,
     *      description="boot not found",
     *      @Model(type=ErrorResponse::class)
     *  )
     */
    #[Route('/api/v1/book/{id}', methods: ['GET'])]
    public function bookById(int $id): Response
    {
        return $this->json($this->bookService->getBookById($id));
    }
}
