<?php

namespace MageMastery\Jobs\Controller\Adminhtml\Department;

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
    * @var \MageMastery\Jobs\Model\Department
    */
    protected $_model;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \MageMastery\Jobs\Model\Department $model
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
        return $this->_authorization->isAllowed('MageMastery_Jobs::department_edit');
    }


    /**
     * Init actions
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function _initAction()
    {
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('MageMastery_Jobs::department')
        ->addBreadcrumb(__('Department'), __('Department'))
        ->addBreadcrumb(__('Manage Departments'), __('Manage Departments'));
        return $resultPage;
    }

    /**
     * Edit Department
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
                $this->messageManager->addErrorMessage(__('This department does not exist.'));
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
        $this->_coreRegistry->register('jobs_department', $model);

        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_initAction();
        $resultPage->addBreadcrumb(
            $id ? __('Edit Department') : __('New Department'),
            $id ? __('Edit Department') : __('New Department')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Departments'));
        $resultPage->getConfig()->getTitle()
            ->prepend($model->getId() ? $model->getName() : __('New Department'));

        return $resultPage;
    }


}
