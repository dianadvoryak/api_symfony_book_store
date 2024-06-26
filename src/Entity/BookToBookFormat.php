<?php

namespace App\Entity;

use App\Repository\BookToBookFormatRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookToBookFormatRepository::class)]
class BookToBookFormat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    private float $price;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $discountPercent;

    #[ORM\JoinColumn(nullable: false)]
    #[ORM\ManyToOne(targetEntity: Book::class, inversedBy: 'formats')]
    private Book $book;

    #[ORM\JoinColumn(nullable: false)]
    #[ORM\ManyToOne(targetEntity: BookFormat::class, fetch: 'EAGER')]
    private BookFormat $format;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): BookToBookFormat
    {
        $this->price = $price;
        return $this;
    }

    public function getDiscountPercent(): ?int
    {
        return $this->discountPercent;
    }

    public function setDiscountPercent(?int $discountPercent): BookToBookFormat
    {
        $this->discountPercent = $discountPercent;
        return $this;
    }

    public function getBook(): Book
    {
        return $this->book;
    }

    public function setBook(Book $book): BookToBookFormat
    {
        $this->book = $book;
        return $this;
    }

    public function getFormat(): BookFormat
    {
        return $this->format;
    }

    public function setFormat(BookFormat $format): BookToBookFormat
    {
        $this->format = $format;
        return $this;
    }


}
