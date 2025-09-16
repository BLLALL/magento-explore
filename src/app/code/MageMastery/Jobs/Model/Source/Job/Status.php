<?php

namespace MageMastery\Jobs\Model\Source\Job;

class Status implements \Magento\Framework\Data\OptionSourceInterface
{

    /**
     * @var \MageMastery\Jobs\Model\Job
     */
    protected $_job;

    /**
     * Constructor
     *
     * @param \MageMastery\Jobs\Model\Job $job
     */
    public function __construct(\MageMastery\Jobs\Model\Job $job)
    {
        $this->_job = $job;
    }

    /**
     * Get options
     *
     * @return array
    */
    public function toOptionArray()
    {
        $options = [
            [
                'label' => '',
                'value' => ''
            ]
        ];

        $availableOptions = $this->_job->getAvailableStatuses();

        foreach ($availableOptions as $key => $value) {
            $options[] = [
                'label' => $value,
                'value' => $key
            ];
        }

        return $options;
    }
}
