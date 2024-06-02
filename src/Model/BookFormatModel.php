<?php

namespace App\Model;

class BookFormatModel
{
    private int $id;

    private string $title;

    private ?string $description = null;

    private ?string $comment = null;

    private float $price;

    private ?int $discountPercent = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): BookFormatModel
    {
        $this->id = $id;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): BookFormatModel
    {
        $this->title = $title;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): BookFormatModel
    {
        $this->description = $description;
        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): BookFormatModel
    {
        $this->comment = $comment;
        return $this;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): BookFormatModel
    {
        $this->price = $price;
        return $this;
    }

    public function getDiscountPercent(): ?int
    {
        return $this->discountPercent;
    }

    public function setDiscountPercent(?int $discountPercent): BookFormatModel
    {
        $this->discountPercent = $discountPercent;
        return $this;
    }

}
