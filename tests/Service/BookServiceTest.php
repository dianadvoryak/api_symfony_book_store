<?php

namespace App\Tests\Service;

use App\Entity\Book;
use App\Entity\BookCategory;
use App\Exception\BookCategoryNotFoundException;
use App\Model\BookListItem;
use App\Model\BookListResponse;
use App\Repository\BookCategoryRepository;
use App\Repository\BookRepository;
use App\Repository\ReviewRepository;
use App\Service\BookService;
use App\Service\RatingService;
use App\Tests\AbstractTestCase;
use Doctrine\Common\Collections\ArrayCollection;

class BookServiceTest extends AbstractTestCase
{
    private ReviewRepository $reviewRepository;

    private BookRepository $bookRepository;

    private BookCategoryRepository $bookCategoryRepository;

    private RatingService $ratingService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->reviewRepository = $this->createMock(ReviewRepository::class);
        $this->bookRepository = $this->createMock(BookRepository::class);
        $this->bookCategoryRepository = $this->createMock(BookCategoryRepository::class);
        $this->ratingService = $this->createMock(RatingService::class);
    }

    public function testGetBooksByCategoryNotFound()
    {
        $this->bookCategoryRepository->expects($this->once())
            ->method('existsById')
            ->with(130)
            ->willReturn(false);

        $this->expectException(BookCategoryNotFoundException::class);

        $this->createBookService()->getBooksByCategory(130);
    }

    public function testGetBooksByCategory(): void
    {
        $this->bookRepository->expects($this->once())
            ->method('findBooksByCategoryId')
            ->with(130)
            ->willReturn([$this->createBookEntity()]);

        $this->bookCategoryRepository->expects($this->once())
            ->method('existsById')
            ->with(130)
            ->willReturn(true);

        $expected = new BookListResponse([$this->createBookItemModel()]);

        $this->assertEquals($expected, $this->createBookService()->getBooksByCategory(130));
    }

    private function createBookService(): BookService
    {
        return new BookService(
            $this->bookRepository,
            $this->bookCategoryRepository,
            $this->reviewRepository,
            $this->ratingService
        );
    }

    private function createBookEntity(): Book
    {
        $category = (new BookCategory())->setTitle('Category')->setSlug('category');
        $this->setEntityId($category, 1);

        $book = (new Book())
            ->setTitle('Test Book')
            ->setSlug('test-book')
            ->setMeap(false)
            ->setIsbn('123321')
            ->setDescription('test description')
            ->setAuthor(['Tester'])
            ->setImage('http://localhost/test.png')
            ->setCategories(new ArrayCollection([$category]))
            ->setPublicationDate(new \DateTimeImmutable('2020-10-10'));
        //            ->setFormats(new ArrayCollection([$join]));

        $this->setEntityId($book, 123);

        return $book;
    }

    private function createBookItemModel(): BookListItem
    {
        return (new BookListItem())
            ->setId(123)
            ->setTitle('Test Book')
            ->setSlug('test-book')
            ->setMeap(false)
            ->setAuthor(['Tester'])
            ->setImage('http://localhost/test.png')
            ->setPublicationDate(1602288000);
    }
}
