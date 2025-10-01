<?php
namespace MageMastery\News\Controller\Adminhtml\Categories\Save;

/**
 * Interceptor class for @see \MageMastery\News\Controller\Adminhtml\Categories\Save
 */
class Interceptor extends \MageMastery\News\Controller\Adminhtml\Categories\Save implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \MageMastery\News\Model\CategoryFactory $categoryFactory, \MageMastery\News\Model\ResourceModel\Category $categoryResource)
    {
        $this->___init();
        parent::__construct($context, $categoryFactory, $categoryResource);
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
