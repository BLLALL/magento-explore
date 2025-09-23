<?php

namespace MageMastery\Jobs\Logger;

use Monolog\Logger;

class Handler extends \Magento\Framework\Logger\Handler\Base
{
    /**
    * Logging Level
    * @var int
    */
    protected $loggerType = Logger::DEBUG;

    /**
     * File name
     * @var string
     */
    protected $fileName = '/var/log/magemastery_jobs.log';




}
