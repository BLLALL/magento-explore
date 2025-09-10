<?php

declare(strict_types=1);

namespace MageMastery\Popup\Service;

use MageMastery\Popup\Api\PopupRepositoryInterface;
use MageMastery\Popup\Model\Popup;
use MageMastery\Popup\Model\PopupFactory;
use MageMastery\Popup\Api\Data\PopupInterface;
use MageMastery\Popup\Model\ResourceModel\Popup as PopupResource;


class PopupRepository implements PopupRepositoryInterface
{

    public function __construct(
        private readonly PopupResource $resource,
        private readonly PopupFactory $factory
    )
    {
    }

    public function getById(int $id): PopupInterface
    {
        $popup = $this->factory->create();
        $this->resource->load($popup, $id);
        if (!$popup->getId()) {
            throw new \Exception("Popup with ID " . $id . " not found");
        }
        return $popup;
    }

    /**
     * @param PopupInterface $popup
     * @return void
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     */
    public function save(PopupInterface $popup): void
    {
        $this->resource->save($popup);
    }
}
