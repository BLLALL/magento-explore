<?php
namespace MageMastery\Jobs\Controller\Adminhtml\Job\Delete;

/**
 * Interceptor class for @see \MageMastery\Jobs\Controller\Adminhtml\Job\Delete
 */
class Interceptor extends \MageMastery\Jobs\Controller\Adminhtml\Job\Delete implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \MageMastery\Jobs\Model\Job $model)
    {
        $this->___init();
        parent::__construct($context, $model);
    }

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'execute');
        return $pluginInfo ? $this->___callPlugins('execute', func_get_args(), $pluginInfo) : parent::execute();
    }

    /**
     * {@inheritdoc}
     */
    public function dispatch(\Magento\Framework\App\RequestInterface $request)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'dispatch');
        return $pluginInfo ? $this->___callPlugins('dispatch', func_get_args(), $pluginInfo) : parent::dispatch($request);
    }
}
