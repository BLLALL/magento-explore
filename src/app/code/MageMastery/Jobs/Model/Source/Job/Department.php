<?php

namespace MageMastery\Jobs\Model\Source\Job;

class Department implements \Magento\Framework\Data\OptionSourceInterface
{
    /**
     * @var \MageMastery\Jobs\Model\Department
     */
    protected $_department;

     public function __construct(\MageMastery\Jobs\Model\Department $department)
     {
         $this->_department = $department;
     }

     /**
      * Get options
      *
      * @return array
      */
     public function toOptionArray()
     {
         $options = [
                ['label' => '', 'value' => '']
            ];

        $departmentCollection = $this->_department->getCollection()
            ->addFieldToSelect('entity_id')
            ->addFieldToSelect('name');

        foreach ($departmentCollection as $department) {
            $options[] = ['label' => $department->getName(), 'value' => $department->getId()];
        }

         return $options;
     }
}
