<?php
declare(strict_types=1);

namespace MageMastery\News\Controller\Adminhtml\Articles;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use MageMastery\News\Model\ArticleFactory;
use MageMastery\News\Model\ResourceModel\Article as ArticleResource;

class Save extends Action
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
        $data = $this->getRequest()->getPostValue();
        $resultRedirect = $this->resultRedirectFactory->create();

        if ($data) {
            $model = $this->articleFactory->create();
            $id = $this->getRequest()->getParam('article_id');
            if ($id) {
                $this->articleResource->load($model, $id);
            }

            $model->setData($data);

            try {
                $this->articleResource->save($model);
                $this->messageManager->addSuccessMessage(__('You saved the article.'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
                return $resultRedirect->setPath('*/*/edit', ['id' => $model->getId()]);
            }
        }
        return $resultRedirect->setPath('*/*/');
    }
}