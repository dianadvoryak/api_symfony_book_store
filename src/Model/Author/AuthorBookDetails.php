<?php

namespace App\Model\Author;

use App\Model\BookCategoryModel;
use App\Model\BookFormatModel;

class AuthorBookDetails
{
    private int $id;

    private string $name;

    private string $slug;

    private ?string $image;

    /**
     * @var string[]
     */
    private ?array $authors;

    private ?string $isbn;

    private ?string $description;

    private ?int $publicationDate;

    /**
     * @var BookCategoryModel
     */
    private array $categories = [];

    /**
     * @var BookFormatModel
     */
    private array $formats = [];

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): AuthorBookDetails
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): AuthorBookDetails
    {
        $this->name = $name;
        return $this;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): AuthorBookDetails
    {
        $this->slug = $slug;
        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): AuthorBookDetails
    {
        $this->image = $image;
        return $this;
    }

    public function getAuthors(): ?string
    {
        return $this->authors;
    }

    public function setAuthors(?array $authors): AuthorBookDetails
    {
        $this->authors = $authors;
        return $this;
    }

    public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    public function setIsbn(?string $isbn): AuthorBookDetails
    {
        $this->isbn = $isbn;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): AuthorBookDetails
    {
        $this->description = $description;
        return $this;
    }

    public function getPublicationDate(): ?int
    {
        return $this->publicationDate;
    }

    public function setPublicationDate(?int $publicationDate): AuthorBookDetails
    {
        $this->publicationDate = $publicationDate;
        return $this;
    }

    public function getCategories(): array
    {
        return $this->categories;
    }

    public function setCategories(array $categories): AuthorBookDetails
    {
        $this->categories = $categories;
        return $this;
    }

    public function getFormats(): array
    {
        return $this->formats;
    }

    public function setFormats(array $formats): AuthorBookDetails
    {
        $this->formats = $formats;
        return $this;
    }
}
