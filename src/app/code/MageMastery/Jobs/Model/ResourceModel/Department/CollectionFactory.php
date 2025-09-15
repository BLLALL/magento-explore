<?php
namespace MageMastery\Jobs\Model\ResourceModel\Department;

class CollectionFactory
{
    protected $_objectManager;

    protected $_instanceName = \MageMastery\Jobs\Model\ResourceModel\Department\Collection::class;

    public function __construct(\Magento\Framework\ObjectManagerInterface $objectManager, $instanceName = null)
    {
        $this->_objectManager = $objectManager;
        $this->_instanceName = $instanceName ?? $this->_instanceName;
    }

    public function create(array $data = [])
    {
        return $this->_objectManager->create(\MageMastery\Jobs\Model\ResourceModel\Department\Collection::class, $data);
    }


}
