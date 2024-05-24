<?php

namespace App\Controller;

use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    public function __construct(public BookRepository $bookRepository)
    {
    }

    #[Route('/', name: 'home')]
    public function index():Response
    {
        $books = $this->bookRepository->findAll();
        return $this->json($books);
    }
}
