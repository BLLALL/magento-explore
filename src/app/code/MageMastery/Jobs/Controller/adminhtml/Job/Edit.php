<?php

namespace MageMastery\Jobs\Controller\Adminhtml\Job;

use Magento\Backend\App\Action;
class Edit extends Action {

    /**
    * Core registry
    *
    * @var \Magento\Framework\Registry
    */
    protected $_coreRegistry = null;

    /**
    * @var \Magento\Framework\View\Result\PageFactory
    */
    protected $_resultPageFactory;

    /**
    * @var \MageMastery\Jobs\Model\Job
    */
    protected $_model;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \MageMastery\Jobs\Model\Job $model
    ) {
        parent::__construct($context);
        $this->_coreRegistry = $coreRegistry;
        $this->_resultPageFactory = $resultPageFactory;
        $this->_model = $model;
    }

    /**
     * {@inheritdoc}
     */
    public function isAllowed()
    {
        return $this->_authorization->isAllowed('MageMastery_Jobs::job_edit');
    }


    /**
     * Init actions
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function _initAction()
    {
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('MageMastery_Jobs::job')
        ->addBreadcrumb(__('Job'), __('Job'))
        ->addBreadcrumb(__('Manage Jobs'), __('Manage Jobs'));
        return $resultPage;
    }

    /**
     * Edit Job
     *
     * @return \Magento\Backend\Model\View\Result\Page|\Magento\Backend\Model\View\Result\Redirect
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {

        $id = $this->getRequest()->getParam('id');
        $model = $this->_model;
        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This job does not exist.'));
                /**
                 * @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect
                 */
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }

        $data = $this->_getSession()->getFormData(true);
        if (!empty($data)) {
            $model->setData($data);
        }
        $this->_coreRegistry->register('jobs_job', $model);

        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_initAction();
        $resultPage->addBreadcrumb(
            $id ? __('Edit Job') : __('New Job'),
            $id ? __('Edit Job') : __('New Job')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Jobs'));
        $resultPage->getConfig()->getTitle()
            ->prepend($model->getId() ? $model->getName() : __('New Job'));

        return $resultPage;
    }


}
