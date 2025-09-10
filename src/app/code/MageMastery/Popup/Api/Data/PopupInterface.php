<?php
declare(strict_types=1);

namespace MageMastery\Popup\Api\Data;

interface  PopupInterface
{
    public const DISABLED = 0;
    public const ENABLED = 1;

    public function getPopupId(): int;
    public function setPopupId(int $popupId);
    public function getName(): string;
    public function setName(string $name);
    public function getContent(): string;
    public function setContent(string $content);
    public function getCreatedAt(): string;
    public function setCreatedAt(string $createdAt);
    public function getUpdatedAt(): string;
    public function setUpdatedAt(string $updatedAt);
    public function getIsActive(): bool;
    public function setIsActive(int $status): void;
    public function getTimeOut(): int;
    public function setTimeOut(int $timeOut): void;
}
