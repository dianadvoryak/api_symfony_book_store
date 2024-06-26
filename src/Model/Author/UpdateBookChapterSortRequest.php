<?php

namespace App\Model\Author;

use App\Validation\AtLeastOneRequired;
use Symfony\Component\Validator\Constraints\Positive;

#[AtLeastOneRequired(['nextId', 'previousId'])]
class UpdateBookChapterSortRequest
{
    #[Positive]
    private ?int $id = null;

    #[Positive]
    private ?int $nextId = null;

    #[Positive]
    private ?int $previousId = null;

    public function getNextId(): ?int
    {
        return $this->nextId;
    }

    public function setNextId(?int $nextId): self
    {
        $this->nextId = $nextId;

        return $this;
    }

    public function getPreviousId(): ?int
    {
        return $this->previousId;
    }

    public function setPreviousId(?int $previousId): self
    {
        $this->previousId = $previousId;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): UpdateBookChapterSortRequest
    {
        $this->id = $id;
        return $this;
    }

}
