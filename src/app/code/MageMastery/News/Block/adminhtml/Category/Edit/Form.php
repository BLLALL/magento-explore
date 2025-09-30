<?php
declare(strict_types=1);

namespace MageMastery\News\Block\Adminhtml\Category\Edit;

use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\Registry;
use Magento\Framework\Data\FormFactory;
use MageMastery\News\Model\ResourceModel\Category\CollectionFactory;

class Form extends Generic
{
    protected $categoryCollectionFactory;

    public function __construct(
        Context $context,
        Registry $registry,
        FormFactory $formFactory,
        CollectionFactory $categoryCollectionFactory,
        array $data = []
    ) {
        $this->categoryCollectionFactory = $categoryCollectionFactory;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    protected function _prepareForm()
    {
        $model = $this->_coreRegistry->registry('news_category');
        $form = $this->_formFactory->create(
            ['data' => ['id' => 'edit_form', 'action' => $this->getData('action'), 'method' => 'post']]
        );
        $form->setUseContainer(true);
        $this->setForm($form);

        $fieldset = $form->addFieldset('base_fieldset', ['legend' => __('General Information')]);

        if ($model->getId()) {
            $fieldset->addField('category_id', 'hidden', ['name' => 'category_id']);
        }

        $fieldset->addField(
            'name',
            'text',
            [
                'name' => 'name',
                'label' => __('Name'),
                'title' => __('Name'),
                'required' => true
            ]
        );
        
        $categories = $this->categoryCollectionFactory->create()->toOptionArray();
        array_unshift($categories, ['value' => '', 'label' => __('Select Parent Category')]);

        $fieldset->addField(
            'parent_id',
            'select',
            [
                'name' => 'parent_id',
                'label' => __('Parent Category'),
                'title' => __('Parent Category'),
                'values' => $categories
            ]
        );

        $form->setValues($model->getData());

        return parent::_prepareForm();
    }
}