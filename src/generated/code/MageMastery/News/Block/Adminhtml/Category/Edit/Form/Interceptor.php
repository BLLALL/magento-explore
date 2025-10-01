<?php
namespace MageMastery\News\Block\Adminhtml\Category\Edit\Form;

/**
 * Interceptor class for @see \MageMastery\News\Block\Adminhtml\Category\Edit\Form
 */
class Interceptor extends \MageMastery\News\Block\Adminhtml\Category\Edit\Form implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\Block\Template\Context $context, \Magento\Framework\Registry $registry, \Magento\Framework\Data\FormFactory $formFactory, \MageMastery\News\Model\ResourceModel\Category\CollectionFactory $categoryCollectionFactory, array $data = [])
    {
        $this->___init();
        parent::__construct($context, $registry, $formFactory, $categoryCollectionFactory, $data);
    }

    /**
     * {@inheritdoc}
     */
    public function getForm()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getForm');
        return $pluginInfo ? $this->___callPlugins('getForm', func_get_args(), $pluginInfo) : parent::getForm();
    }
}
