<?php

namespace App\Repository;

use App\Entity\Book;
use App\Entity\BookToBookFormat;
use App\Exception\BookNotFoundException;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @extends ServiceEntityRepository<Book>
 */
class BookRepository extends ServiceEntityRepository
{
    use RepositoryModifyTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Book::class);
    }

    /**
     * @return Book[]
     */
    public function findPublishedBooksByCategoryId(int $id): array
    {
        return $this->getEntityManager()
            ->createQuery('SELECT b FROM App\Entity\Book b WHERE :categoryId MEMBER OF b.categories AND b.publicationDate IS NOT NULL')
            ->setParameter('categoryId', $id)
            ->getResult();
    }

    public function getPublishedById(int $id): Book
    {
        $book = $this->getEntityManager()->createQuery('SELECT b FROM App\Entity\Book WHERE b.id = :id AND b.publicationDate IS NOT NULL')
            ->setParameter('id', $id)
            ->getOneOrNullResult();

        $book = $this->find($id);
        if (null === $book) {
            throw new BookNotFoundException();
        }

        return $book;
    }

    /**
     * @return Book[]
     */
    public function findBooksByIds(array $ids): array
    {
        return $this->_em->createQuery('SELECT b FROM App\Entity\Book b WHERE b.id MEMBER OF (:ids) AND b.publicationDate IS NOT NULL')
            ->setParameter('ids', $ids)
            ->getResult();
    }

    /**
     * @return Book[]
     */
    public function findUserBooks(UserInterface $user): array
    {
        return $this->findBy(['user' => $user]);
    }

    public function getBookById(int $id): Book
    {
        $book = $this->find($id);

        if (null === $book) {
            throw new BookNotFoundException();
        }

        return $book;
    }

    public function existsBySlug(string $slug): bool
    {
        return null !== $this->findOneBy(['slug' => $slug]);
    }

    public function existsUserBookById(int $id, UserInterface $user): bool
    {
        return null !== $this->findOneBy(['id' => $id, 'user' => $user]);
    }

    public function saveBookFormatReference(BookToBookFormat $bookToBookFormat): void
    {
        $this->getEntityManager()->persist($bookToBookFormat);
    }

    public function removeBookFormatReference(BookToBookFormat $bookToBookFormat): void
    {
        $this->getEntityManager()->remove($bookToBookFormat);
    }
}
