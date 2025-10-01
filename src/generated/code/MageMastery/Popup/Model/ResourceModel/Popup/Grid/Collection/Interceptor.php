<?php
namespace MageMastery\Popup\Model\ResourceModel\Popup\Grid\Collection;

/**
 * Interceptor class for @see \MageMastery\Popup\Model\ResourceModel\Popup\Grid\Collection
 */
class Interceptor extends \MageMastery\Popup\Model\ResourceModel\Popup\Grid\Collection implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\Data\Collection\EntityFactoryInterface $entityFactory, \Psr\Log\LoggerInterface $logger, \Magento\Framework\Data\Collection\Db\FetchStrategyInterface $fetchStrategy, \Magento\Framework\Event\ManagerInterface $eventManager, $mainTable, $eventPrefix, $eventObject, $resourceModel, \Magento\Framework\Stdlib\DateTime\TimezoneInterface $timeZone, $model = 'MageMastery\\Popup\\Model\\Popup', $connection = null, ?\Magento\Framework\Model\ResourceModel\Db\AbstractDb $resource = null)
    {
        $this->___init();
        parent::__construct($entityFactory, $logger, $fetchStrategy, $eventManager, $mainTable, $eventPrefix, $eventObject, $resourceModel, $timeZone, $model, $connection, $resource);
    }

    /**
     * {@inheritdoc}
     */
    public function getCurPage($displacement = 0)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getCurPage');
        return $pluginInfo ? $this->___callPlugins('getCurPage', func_get_args(), $pluginInfo) : parent::getCurPage($displacement);
    }
}
