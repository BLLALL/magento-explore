<?php
declare(strict_types=1);

namespace MageMastery\News\Controller\Adminhtml\Articles;

use Magento\Backend\App\Action;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use MageMastery\News\Model\ArticleFactory;
use Magento\Backend\App\Action\Context;

class Edit extends Action
{
    protected $resultPageFactory;
    protected $articleFactory;
    protected $registry;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        ArticleFactory $articleFactory,
        Registry $registry
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->articleFactory = $articleFactory;
        $this->registry = $registry;
        parent::__construct($context);
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $model = $this->articleFactory->create();

        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This article no longer exists.'));
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }

        $this->registry->register('news_article', $model);

        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend($model->getId() ? __('Edit Article') : __('New Article'));
        return $resultPage;
    }
}   