<?php
namespace MageMastery\News\Controller\Adminhtml\Articles\Save;

/**
 * Interceptor class for @see \MageMastery\News\Controller\Adminhtml\Articles\Save
 */
class Interceptor extends \MageMastery\News\Controller\Adminhtml\Articles\Save implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \MageMastery\News\Model\ArticleFactory $articleFactory, \MageMastery\News\Model\ResourceModel\Article $articleResource)
    {
        $this->___init();
        parent::__construct($context, $articleFactory, $articleResource);
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
