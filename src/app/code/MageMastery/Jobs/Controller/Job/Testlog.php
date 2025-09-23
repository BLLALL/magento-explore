<?php

namespace MageMastery\Jobs\Controller\Job;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use MageMastery\Jobs\Logger\Logger;

class Testlog extends Action
{

    /**
     *
     */
    protected $_logger;


    public function __construct(
        Context $context,
         Logger $logger
    ) {
        parent::__construct($context);
        $this->_logger = $logger;
    }

    public function execute()
    {
        $this->_logger->debug('Debug message');
        $this->_logger->info('Info message');
        $this->_logger->notice('Notice message');
        $this->_logger->warning('Warning message');
        $this->_logger->error('Error message');
        $this->_logger->critical('Critical message');
        $this->_logger->alert('Alert message');
        $this->_logger->emergency('Emergency message');

        $this->_view->loadLayout();
        $this->_view->getLayout()->initMessages();
        $this->_view->renderLayout();
    }
}
