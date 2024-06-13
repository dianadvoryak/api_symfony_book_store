<?php

namespace App\Model\Author;

use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Positive;

class UpdateBookChapterRequest
{
    #[NotBlank]
    #[Positive]
    private string $id;

    #[NotBlank]
    private string $title;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): UpdateBookChapterRequest
    {
        $this->id = $id;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): UpdateBookChapterRequest
    {
        $this->title = $title;
        return $this;
    }

}
