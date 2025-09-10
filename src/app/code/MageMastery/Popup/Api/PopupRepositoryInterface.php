<?php declare(strict_types=1);

namespace MageMastery\Popup\Api;

use MageMastery\Popup\Api\Data\PopupInterface;

interface PopupRepositoryInterface
{
    /**
     * @param int $id
     * @return PopupInterface
     */
    public function getById(int $id): PopupInterface;

    /**
     * @param PopupInterface $popup
     * @return void
     */
    public function save(PopupInterface $popup): void;

    // public function delete(PopupInterface $popup): bool;
}
