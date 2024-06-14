<?php

namespace App\Model;

class BookChapterTreeResponse
{
    /**
     * @param BookChapterModel[] $items
     */
    public function __construct(private array $items = [])
    {
    }

    /**
     * @return BookChapterModel[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    public function addItem(BookChapterModel $chapter): void
    {
        $this->items[] = $chapter;
    }
}

