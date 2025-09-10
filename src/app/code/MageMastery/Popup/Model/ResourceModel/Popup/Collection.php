<?php
declare(strict_types=1);

namespace MageMastery\Popup\Model\ResourceModel\Popup;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'popup_id';

    protected function _construct()
    {
        $this->_init(
            \MageMastery\Popup\Model\Popup::class,
            \MageMastery\Popup\Model\ResourceModel\Popup::class
        );
    }
}
