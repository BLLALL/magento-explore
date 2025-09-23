<?php

namespace MageMastery\Jobs\Cron;

use Psr\Log\LoggerInterface;

class DisableJobs
{
    /**
     * @var \MageMastery\Jobs\Model\Job
     */
    protected $_job;
    protected $logger;

    /**
     * @param \MageMastery\Jobs\Model\Job $job
     */
    public function __construct(
        \MageMastery\Jobs\Model\Job $job,
        LoggerInterface $loggerInterface
    ) {
        $this->logger = $loggerInterface;
        $this->_job = $job;
    }

    /**
     * Disable jobs which date is less than the current date
     *
     * @param \Magento\Cron\Model\Schedule $schedule
     * @return void
     */
    public function execute(\Magento\Cron\Model\Schedule $schedule)
    {
        $nowDate = date('Y-m-d H:i:s');


        $this->logger->info('Running DisableJobs cron. Current date: ' . $nowDate);

        $jobsCollection = $this->_job->getCollection()
            ->addFieldToFilter('date', array ('lt' => $nowDate));

        foreach($jobsCollection AS $job) {
            $job->setStatus($job->getDisableStatus());
            $job->save();
        }
    }
}
