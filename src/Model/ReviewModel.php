<?php

namespace App\Model;

class ReviewModel
{
    private int $id;

    private string $content;

    private string $author;

    private int $rating;

    private int $createdAt;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): ReviewModel
    {
        $this->id = $id;
        return $this;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): ReviewModel
    {
        $this->content = $content;
        return $this;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function setAuthor(string $author): ReviewModel
    {
        $this->author = $author;
        return $this;
    }

    public function getRating(): int
    {
        return $this->rating;
    }

    public function setRating(int $rating): ReviewModel
    {
        $this->rating = $rating;
        return $this;
    }

    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    public function setCreatedAt(int $createdAt): ReviewModel
    {
        $this->createdAt = $createdAt;
        return $this;
    }

}
