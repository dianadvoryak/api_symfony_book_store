<?php

namespace App\Repository;

use App\Entity\BookContent;
use App\Exception\BookChapterContentNotFoundException;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * @extends ServiceEntityRepository<BookContent>
 */
class BookContentRepository extends ServiceEntityRepository
{
    use RepositoryModifyTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BookContent::class);
    }

    public function getById(int $id): BookContent
    {
        $chapter = $this->find($id);
        if (null === $chapter) {
            throw new BookChapterContentNotFoundException();
        }

        return $chapter;
    }

    /**
     * @return \Traversable&\Countable
     */
    public function getPageByChapterId(int $id, bool $onlyPublished, int $offset, int $limit)
    {
        $query = implode(' ', array_filter([
            'SELECT b FROM App\Entity\BookContent b WHERE b.chapter = :id',
            $onlyPublished ? 'AND b.isPublished = true' : null,
            'ORDER BY b.id ASC',
        ]));

        $query = $this->_em
            ->createQuery($query)
            ->setParameter('id', $id)
            ->setFirstResult($offset)
            ->setMaxResults($limit);

        return new Paginator($query, false);
    }

    public function countByChapterId(int $id, bool $onlyPublished): int
    {
        $condition = ['chapter' => $id];
        if ($onlyPublished) {
            $condition['isPublished'] = true;
        }

        return $this->count($condition);
    }
}
