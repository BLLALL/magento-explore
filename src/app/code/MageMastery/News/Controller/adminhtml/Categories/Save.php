<?php
declare(strict_types=1);

namespace MageMastery\News\Controller\Adminhtml\Categories;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use MageMastery\News\Model\CategoryFactory;
use MageMastery\News\Model\ResourceModel\Category as CategoryResource;

class Save extends Action
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
        $data = $this->getRequest()->getPostValue();
        $resultRedirect = $this->resultRedirectFactory->create();

        if ($data) {
            $model = $this->categoryFactory->create();
            $id = $this->getRequest()->getParam('category_id');
            if ($id) {
                $this->categoryResource->load($model, $id);
            }
            
            // Set parent_id to null if the value is empty
            if (empty($data['parent_id'])) {
                $data['parent_id'] = null;
            }

            $model->setData($data);

            try {
                $this->categoryResource->save($model);
                $this->messageManager->addSuccessMessage(__('You saved the category.'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
                return $resultRedirect->setPath('*/*/edit', ['id' => $model->getId()]);
            }
        }
        return $resultRedirect->setPath('*/*/');
    }
}