<?php
namespace MageMastery\Popup\Model;

use Magento\Framework\Model\AbstractModel;

use MageMastery\Popup\Model\ResourceModel\Popup as PopupResource;
use MageMastery\Popup\Api\Data\PopupInterface;

class Popup extends AbstractModel implements PopupInterface
{

    private const POPUP_ID = 'popup_id';
    private const NAME = 'name';
    private const CONTENT = 'content';
    private const IS_ACTIVE = 'is_active';
    private const CREATED_AT = 'created_at';
    private const UPDATED_AT = 'updated_at';
    private const TIMEOUT = 'timeout';


    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        array $data = []
    ) {
        $this->_eventPrefix = 'magemastery_popup';
        $this->_eventObject = 'popup';
        $this->_idFieldName = self::POPUP_ID;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    protected function _construct()
    {
        $this->_init(PopupResource::class);
    }

    public function getPopupId(): int
    {
        return $this->getData(self::POPUP_ID);
    }

    public function setPopupId(int $popupId): void
    {
        $this->setData(self::POPUP_ID, $popupId);
    }

    public function getName(): string
    {
        return $this->getData(self::NAME);
    }

    public function setName(string $name): void
    {
        $this->setData(self::NAME, $name);
    }

    public function getContent(): string
    {
        return $this->getData(self::CONTENT);
    }

    public function setContent(string $content): void
    {
        $this->setData(self::CONTENT, $content);
    }

    public function getIsActive(): bool
    {
        return $this->getData(self::IS_ACTIVE);
    }

    public function setIsActive(int $status): void
    {
        $this->setData(self::IS_ACTIVE, $status);
    }

    public function getCreatedAt(): string
    {
        return $this->getData(self::CREATED_AT);
    }

    public function setCreatedAt(string $createdAt): void
    {
        $this->setData(self::CREATED_AT, $createdAt);
    }

    public function getUpdatedAt(): string
    {
        return $this->getData(self::UPDATED_AT);
    }

    public function setUpdatedAt(string $updatedAt): void
    {
        $this->setData(self::UPDATED_AT, $updatedAt);
    }

    public function getTimeOut(): int
    {
        return $this->getData(self::TIMEOUT);
    }

    public function setTimeOut(int $timeout): void
    {
        $this->setData(self::TIMEOUT, $timeout);
    }



}
