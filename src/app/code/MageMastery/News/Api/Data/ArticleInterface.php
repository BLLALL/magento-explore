<?php
declare(strict_types=1);

namespace MageMastery\News\Api\Data;

interface ArticleInterface
{
    public function getArticleId(): ?int;
    public function setArticleId(int $articleId): void;
    public function getTitle(): string;
    public function setTitle(string $title): void;
    public function getContent(): string;
    public function setContent(string $content): void;
    public function getCreatedAt(): string;
    public function setCreatedAt(string $createdAt): void;
    public function getUpdatedAt(): string;
    public function setUpdatedAt(string $updatedAt): void;
}