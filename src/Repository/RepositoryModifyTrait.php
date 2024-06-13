<?php

namespace App\Repository;

use App\Entity\Book;

trait RepositoryModifyTrait
{
    public function save(object $book): void
    {
        assert($this->entityName === get_class($book));
        $this->getEntityManager()->persist($book);
    }

    public function commit(): void
    {
        $this->getEntityManager()->flush();
    }

    public function saveAndCommit(object $book): void
    {
        $this->save($book);
        $this->commit();
    }

    public function removeAndCommit(object $book): void
    {
        $this->remove($book);
        $this->commit();
    }

    public function remove(object $book): void
    {
        assert($this->entityName === get_class($book));
        $this->getEntityManager()->remove($book);
    }
}
