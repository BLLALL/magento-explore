<?php
declare(strict_types=1);

namespace MageMastery\News\Block\Adminhtml\Category;

use Magento\Backend\Block\Widget\Form\Container;
use Magento\Framework\Registry;
use Magento\Backend\Block\Widget\Context;

class Edit extends Container
{
    protected $registry;

    public function __construct(
        Context $context,
        Registry $registry,
        array $data = []
    ) {
        $this->registry = $registry;
        parent::__construct($context, $data);
    }

    protected function _construct()
    {
        $this->_objectId = 'id';
        $this->_blockGroup = 'MageMastery_News';
        $this->_controller = 'adminhtml_category_edit';
        parent::_construct();
        $this->buttonList->update('save', 'label', __('Save Category'));
        $this->buttonList->update('delete', 'label', __('Delete Category'));
    }

    public function getHeaderText()
    {
        if ($this->registry->registry('news_category')->getId()) {
            return __("Edit Category '%1'", $this->escapeHtml($this->registry->registry('news_category')->getName()));
        }
        return __('New Category');
    }
}