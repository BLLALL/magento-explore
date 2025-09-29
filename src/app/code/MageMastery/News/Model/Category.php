<?php
declare(strict_types=1);

namespace MageMastery\News\Model;

use MageMastery\News\Model\ResourceModel\Category as ResourceModelCategory;
use MageMastery\News\Api\Data\CategoryInterface;
use Magento\Framework\Model\AbstractModel;

class Category extends AbstractModel implements CategoryInterface
{
    const CATEGORY_ID = 'category_id';
    const NAME = 'name';
    const PARENT_ID = 'parent_id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected function _construct()
    {
        $this->_eventPrefix = 'magemastery_news_category';
        $this->_eventObject = 'category';
        $this->_idFieldName = self::CATEGORY_ID;
        $this->_init(ResourceModelCategory::class);
    }

    public function getCategoryId(): int
    {
        return $this->getData(self::CATEGORY_ID);
    }

    public function setCategoryId(?int $id): void
    {
        $this->setData(self::CATEGORY_ID, $id);
    }

    public function getName(): string
    {
        return $this->getData(self::NAME);
    }

    public function setName(string $name): void
    {
        $this->setData(self::NAME, $name);
    }

    public function getParentId(): int
    {
        return $this->getData(self::PARENT_ID);
    }

    public function setParentId(int $parent_id): void
    {
        $this->setData(self::PARENT_ID, $parent_id);
    }

    public function getCreatedAt(): string
    {
        return $this->getData(self::CREATED_AT);
    }

    public function setCreatedAt(string $createdAt): void
    {
        $this->setData(self::CREATED_AT, $createdAt);
    }

    public function getUpdatedAt(): string
    {
        return $this->getData(self::UPDATED_AT);
    }

    public function setUpdatedAt(string $updatedAt): void
    {
        $this->setData(self::UPDATED_AT, $updatedAt);
    }

}
