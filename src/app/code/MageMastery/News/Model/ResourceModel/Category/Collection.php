<?php
declare(strict_types=1);
namespace MageMastery\News\Model\ResourceModel\Category;

use MageMastery\News\Model\Category;
use MageMastery\News\Model\ResourceModel\Category as ResourceModelCategory;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'category_id';

    protected function _construct()
    {
        $this->_init(
        Category::class,
        ResourceModelCategory::class
        );

    }
    public function toOptionArray()
    {
        return $this->_toOptionArray('category_id', 'name');
    }

}
