<?php

namespace MageMastery\News\Controller\Adminhtml\Articles;

use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\App\Action\Context;

class Index extends Action
{
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    const ADMIN_RESOURCE = 'MageMastery_News::articles';


    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Articles grid page
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
 
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('MageMastery_News::articles');
        $resultPage->getConfig()->getTitle()->prepend(__('Articles'));

        return $resultPage;
    }
}