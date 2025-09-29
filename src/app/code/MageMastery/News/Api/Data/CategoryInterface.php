<?php
declare(strict_types=1);

namespace MageMastery\News\Api\Data;


interface CategoryInterface
{
    public function getCategoryId(): int;
    public function setCategoryId(int $categoryId): void;
    public function getName(): string;
    public function setName(string $name): void;
    public function getParentId(): int;
    public function setParentId(int $parent_id): void;
    public function getCreatedAt(): string;
    public function setCreatedAt(string $createdAt): void;
    public function getUpdatedAt(): string;
    public function setUpdatedAt(string $updatedAt): void;
}
