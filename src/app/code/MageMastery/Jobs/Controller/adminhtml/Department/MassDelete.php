<?php

namespace MageMastery\Jobs\Controller\Adminhtml\Department;

use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\App\Action\Context;
use Magento\Ui\Component\MassAction\Filter;
use MageMastery\Jobs\Model\ResourceModel\Department\CollectionFactory;

class MassDelete extends \Magento\Backend\App\Action {

    /**
    * @var Filter
    */
    protected $filter;

    /**
    * @var CollectionFactory
    */
    protected $collectionFactory;


    /**
    * @param Context $context
    * @param Filter $filter
    * @param CollectionFactory $collectionFactory
    */
    public function __construct(Context $context, Filter $filter, CollectionFactory $collectionFactory)
    {
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context);
    }


    public function execute()
    {
        $collection = $this->filter->getCollection($this->collectionFactory->create());
        $collection->walk('delete');
        $this->messageManager->addSuccessMessage(__('A total of %1 record(s) have been deleted.', $collection->getSize()));
        return $this->resultFactory->create(ResultFactory::TYPE_REDIRECT)->setPath('*/*/');
    }


}
