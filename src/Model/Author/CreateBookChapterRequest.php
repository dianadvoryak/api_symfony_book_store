<?php

namespace App\Model\Author;

use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Positive;

class CreateBookChapterRequest
{
    #[NotBlank]
    private string $title;

    #[Positive]
    private ?int $parentId = null;

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): CreateBookChapterRequest
    {
        $this->title = $title;
        return $this;
    }

    public function getParentId(): ?int
    {
        return $this->parentId;
    }

    public function setParentId(?int $parentId): CreateBookChapterRequest
    {
        $this->parentId = $parentId;
        return $this;
    }

}
