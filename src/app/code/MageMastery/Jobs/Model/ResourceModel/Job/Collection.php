<?php
namespace MageMastery\Jobs\Model\ResourceModel\Job;

use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    protected $_idFieldName = \MageMastery\Jobs\Model\Job::JOB_ID;

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('MageMastery\Jobs\Model\Job', 'MageMastery\Jobs\Model\ResourceModel\Job');
    }

    public function addStatusFilter($job, $department)
    {
        $this->addFieldToSelect('*')
            ->addFieldToFilter('status', $job->getEnableStatus())
            ->join(
                ['department' => $department->getResource()->getMainTable()],
                'main_table.department_id = department.' . $department->getIdFieldName(),
                ['department_name' => 'name']
            );
        return $this;
    }

}
