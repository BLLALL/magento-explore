<?php
declare(strict_types=1);

namespace MageMastery\News\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
class Category extends AbstractDb
{
    protected const TABLE_NAME = "news_categories";
    private const FIELD_NAME = "category_id";
    protected function  _construct()
    {
        $this->_init(self::TABLE_NAME, self::FIELD_NAME);
    }
}
