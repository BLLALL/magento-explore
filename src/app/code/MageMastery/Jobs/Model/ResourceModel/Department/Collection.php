<?php
namespace MageMastery\Jobs\Model\ResourceModel\Department;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    protected $_idFieldName = \MageMastery\Jobs\Model\Department::DEPARTMENT_ID;
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \MageMastery\Jobs\Model\Department::class,
            \MageMastery\Jobs\Model\ResourceModel\Department::class
        );
    }
}
