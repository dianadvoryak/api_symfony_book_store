<?php

namespace App\Model;

class BookCategoryListResponse
{
    /**
     * @var BookCategoryModel[]
     */
    private array $items;

    /**
     * @param BookCategoryModel[] $items
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * @return BookCategoryModel[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

}
