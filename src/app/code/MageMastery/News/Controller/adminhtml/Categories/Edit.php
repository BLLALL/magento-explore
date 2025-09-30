<?php
declare(strict_types=1);

namespace MageMastery\News\Controller\Adminhtml\Categories;

use Magento\Backend\App\Action;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use MageMastery\News\Model\CategoryFactory;
use Magento\Backend\App\Action\Context;

class Edit extends Action
{
    protected $resultPageFactory;
    protected $categoryFactory;
    protected $registry;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        CategoryFactory $categoryFactory,
        Registry $registry
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->categoryFactory = $categoryFactory;
        $this->registry = $registry;
        parent::__construct($context);
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $model = $this->categoryFactory->create();

        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This category no longer exists.'));
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }

        $this->registry->register('news_category', $model);

        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend($model->getId() ? __('Edit Category') : __('New Category'));
        return $resultPage;
    }
}