<?php
declare(strict_types=1);

namespace MageMastery\News\Controller\Adminhtml\Categories;

use Magento\Backend\App\Action;
use Magento\Backend\Model\View\Result\ForwardFactory;
use Magento\Backend\App\Action\Context;

class NewAction extends Action
{
    const ADMIN_RESOURCE = 'MageMastery_News::categories';

    protected $resultForwardFactory;

    public function __construct(
        Context $context,
        ForwardFactory $resultForwardFactory
    ) {
        $this->resultForwardFactory = $resultForwardFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultForward = $this->resultForwardFactory->create();
        return $resultForward->forward('edit');
    }
}