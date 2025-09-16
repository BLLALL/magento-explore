<?php

namespace MageMastery\Jobs\Controller\Adminhtml\Job;

use Magento\Backend\App\Action;
use Magento\Backend\Model\View\Result\ForwardFactory;
use Magento\Backend\App\Action\Context;
class NewAction extends Action
{
    protected $_resultForwardFactory;

    public function __construct(
        Context $context,
        ForwardFactory $resultFactory
    ) {
        parent::__construct($context);
        $this->_resultForwardFactory = $resultFactory;
    }

    public function isAllowed()
    {
        return $this->_authorization->isAllowed('MageMastery_Jobs::job_save');
    }


    public function execute()
    {
        $resultForward = $this->_resultForwardFactory->create();
        return $resultForward->forward('edit');
    }


}
