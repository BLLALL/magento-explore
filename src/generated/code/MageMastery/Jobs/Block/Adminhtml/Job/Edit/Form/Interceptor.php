<?php
namespace MageMastery\Jobs\Block\Adminhtml\Job\Edit\Form;

/**
 * Interceptor class for @see \MageMastery\Jobs\Block\Adminhtml\Job\Edit\Form
 */
class Interceptor extends \MageMastery\Jobs\Block\Adminhtml\Job\Edit\Form implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\Block\Template\Context $context, \Magento\Framework\Registry $registry, \Magento\Framework\Data\FormFactory $formFactory, \Magento\Store\Model\System\Store $systemStore, \MageMastery\Jobs\Model\Source\Job\Status $status, \MageMastery\Jobs\Model\Source\Job\Department $department, array $data = [])
    {
        $this->___init();
        parent::__construct($context, $registry, $formFactory, $systemStore, $status, $department, $data);
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
