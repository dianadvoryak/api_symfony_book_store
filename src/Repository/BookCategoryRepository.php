<?php

namespace App\Repository;

use App\Entity\BookCategory;
use App\Exception\BookCategoryNotFoundException;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<BookCategory>
 */
class BookCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BookCategory::class);
    }

    public function save(BookCategory $bookCategory): void
    {
        $this->em->persist($bookCategory);
    }

    public function remove(BookCategory $bookCategory): void
    {
        $this->em->remove($bookCategory);
    }

    public function saveAndCommit(BookCategory $bookCategory): void
    {
        $this->save($bookCategory);
        $this->commit();
    }

    public function removeAndCommit(BookCategory $bookCategory): void
    {
        $this->remove($bookCategory);
        $this->commit();
    }

    public function commit(): void
    {
        $this->em->flush();
    }

    /**
     * @return BookCategory[]
     */
    public function findAllSortByTitle(): array
    {
        return $this->findBy([], ['title' => 'ASC']);
    }

    public function existsById(int $id): bool
    {
        return null !== $this->find($id);
    }

    public function getById(int $id): BookCategory
    {
        $category = $this->find($id);
        if (null === $category) {
            throw new BookCategoryNotFoundException();
        }

        return $category;
    }

    public function countBooksInCategory(int $categoryId): int
    {
        return $this->getEntityManager()->createQuery('SELECT COUNT(b.id) FROM App\Entity\Book b WHERE :categoryId MEMBER OF b.categories')
            ->setParameter('categoryId', $categoryId)
            ->getSingleScalarResult();
    }

    public function existsBySlug(string $slug): bool
    {
        return null !== $this->findOneBy(['slug' => $slug]);
    }
}
