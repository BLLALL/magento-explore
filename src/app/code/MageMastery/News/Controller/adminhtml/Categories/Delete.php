<?php
declare(strict_types=1);

namespace MageMastery\News\Controller\Adminhtml\Categories;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use MageMastery\News\Model\CategoryFactory;
use MageMastery\News\Model\ResourceModel\Category as CategoryResource;

class Delete extends Action
{
    protected $categoryFactory;
    protected $categoryResource;

    public function __construct(
        Context $context,
        CategoryFactory $categoryFactory,
        CategoryResource $categoryResource
    ) {
        $this->categoryFactory = $categoryFactory;
        $this->categoryResource = $categoryResource;
        parent::__construct($context);
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($id) {
            try {
                $model = $this->categoryFactory->create();
                $this->categoryResource->load($model, $id);
                $this->categoryResource->delete($model);
                $this->messageManager->addSuccessMessage(__('The category has been deleted.'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
                return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
            }
        }
        $this->messageManager->addErrorMessage(__('We can\'t find a category to delete.'));
        return $resultRedirect->setPath('*/*/');
    }
}