<?php
namespace MageMastery\Jobs\Model;

use Magento\Framework\Model\AbstractModel;

class Job extends AbstractModel
{

    const JOB_ID = 'entity_id';

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'jobs';

    /**
     * Job model event object
     *
     * @var string
     */
    protected $_eventObject = 'job';

    /**
     * Name of object id field
     *
     * @var string
     */
    protected $_idFieldName = self::JOB_ID;

    /**
     * Initialize resource model
     * @return void
     */
    protected function _construct()
    {
        $this->_init('MageMastery\Jobs\Model\ResourceModel\Job');
    }

    /**
     * Get enable status
     *
     * @return int
     */
    public function getEnableStatus() {
        return 1;
    }

    /**
     * Get disable status
     *
     * @return int
     */
    public function getDisableStatus() {
        return 0;
    }

    /**
     * Get available statuses
     *
     * @return array
     */
    public function getAvailableStatuses() {
        return [$this->getDisableStatus() => __('Disabled'), $this->getEnableStatus() => __('Enabled')];
    }
}
