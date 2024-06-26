<?php

namespace App\Model;

class BookChapterModel
{
    /**
     * @param BookChapterModel[] $items
     */
    public function __construct(private readonly int $id, private readonly string $title, private readonly string $slug, private array $items = [])
    {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getSlug(): string
    {
        return $this->slug;
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
