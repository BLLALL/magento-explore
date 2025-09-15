<?php
namespace MageMastery\Jobs\Model\ResourceModel;

use \Magento\Framework\Model\ResourceModel\Db\AbstractDb;


class Job extends AbstractDb {
    protected function _construct()
    {
        $this->_init('magemastery_job', 'entity_id');
    }
}
