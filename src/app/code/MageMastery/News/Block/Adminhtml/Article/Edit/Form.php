<?php
declare(strict_types=1);

namespace MageMastery\News\Block\Adminhtml\Article\Edit;

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
        /** @var \MageMastery\News\Model\Article $model */
        $model = $this->_coreRegistry->registry('news_article');
        $form = $this->_formFactory->create(
            ['data' => ['id' => 'edit_form', 'action' => $this->getData('action'), 'method' => 'post']]
        );

        $fieldset = $form->addFieldset('base_fieldset', ['legend' => __('General Information')]);

        if ($model->getId()) {
            $fieldset->addField('article_id', 'hidden', ['name' => 'article_id']);
        }

        $fieldset->addField(
            'title',
            'text',
            [
                'name' => 'title',
                'label' => __('Title'),
                'title' => __('Title'),
                'required' => true
            ]
        );
        
        $categories = $this->categoryCollectionFactory->create()->toOptionArray();
        $fieldset->addField(
            'category_ids',
            'multiselect',
            [
                'name' => 'category_ids[]',
                'label' => __('Categories'),
                'title' => __('Categories'),
                'required' => true,
                'values' => $categories
            ]
        );

        $fieldset->addField(
            'content',
            'textarea',
            [
                'name' => 'content',
                'label' => __('Content'),
                'title' => __('Content'),
                'required' => true
            ]
        );
        
        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}