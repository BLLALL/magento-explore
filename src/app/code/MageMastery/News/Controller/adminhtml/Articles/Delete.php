<?php
declare(strict_types=1);

namespace MageMastery\News\Controller\Adminhtml\Articles;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use MageMastery\News\Model\ArticleFactory;
use MageMastery\News\Model\ResourceModel\Article as ArticleResource;

class Delete extends Action
{
    protected $articleFactory;
    protected $articleResource;

    public function __construct(
        Context $context,
        ArticleFactory $articleFactory,
        ArticleResource $articleResource
    ) {
        $this->articleFactory = $articleFactory;
        $this->articleResource = $articleResource;
        parent::__construct($context);
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($id) {
            try {
                $model = $this->articleFactory->create();
                $this->articleResource->load($model, $id);
                $this->articleResource->delete($model);
                $this->messageManager->addSuccessMessage(__('The article has been deleted.'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
                return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
            }
        }
        $this->messageManager->addErrorMessage(__('We can\'t find an article to delete.'));
        return $resultRedirect->setPath('*/*/');
    }
}