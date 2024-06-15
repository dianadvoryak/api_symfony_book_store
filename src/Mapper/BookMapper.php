<?php

namespace App\Mapper;

use App\Entity\Book;
use App\Entity\BookCategory;
use App\Entity\BookFormat;
use App\Entity\BookToBookFormat;
use App\Model\Author\AuthorBookDetails;
use App\Model\BookCategoryModel;
use App\Model\BookDetails;
use App\Model\BookFormatModel;
use App\Model\BookListItem;

class BookMapper
{
    public static function map(Book $book, BaseBookDetails $model): void
    {
        $publicationDate = $book->getPublicationDate();
        if (null !== $publicationDate) {
            $publicationDate = $publicationDate->getTimestamp();
        }

        $model
            ->setId($book->getId())
            ->setTitle($book->getTitle())
            ->setSlug($book->getSlug())
            ->setImage($book->getImage())
            ->setAuthors($book->getAuthor())
            ->setPublicationDate($publicationDate);
    }

    public static function mapCategories(Book $book): array
    {
        return $book->getCategories()
            ->map(fn (BookCategory $bookCategory) => new BookCategoryModel(
                $bookCategory->getId(), $bookCategory->getTitle(), $bookCategory->getSlug()
            ))
            ->toArray();
    }

    /**
     * @return BookFormat[]
     */
    public static function mapFormats(Book $book): array
    {
        return $book->getFormats()
            ->map(fn (BookToBookFormat $formatJoin) => (new BookFormat())
                ->setId($formatJoin->getFormat()->getId())
                ->setTitle($formatJoin->getFormat()->getTitle())
                ->setDescription($formatJoin->getFormat()->getDescription())
                ->setComment($formatJoin->getFormat()->getComment())
                ->setPrice($formatJoin->getPrice())
                ->setDiscountPercent($formatJoin->getDiscountPercent()
                ))
            ->toArray();
    }
}
