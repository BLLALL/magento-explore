<?php

declare(strict_types=1);
namespace MageMastery\Popup\Controller\Adminhtml\Popup;

use MageMastery\Popup\Api\Data\PopupInterface;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultInterface;
use Magento\Ui\Component\MassAction\Filter;
use Magento\Framework\Controller\ResultFactory;
use MageMastery\Popup\Model\ResourceModel\Popup\CollectionFactory;
use MageMastery\Popup\Api\PopupRepositoryInterface;
use Magento\Framework\Exception\LocalizedException;
class MassDisable extends Action {

    public function __construct(
        Context $context,
        private readonly Filter $filter,
        private readonly CollectionFactory $collectionFactory,
        private readonly PopupRepositoryInterface $popupRepository
    ) {
        parent::__construct($context);
    }

    /**
     * @return ResultInterface
     */
    public function execute(): ResultInterface
    {
        $collection = $this->filter->getCollection($this->collectionFactory->create());
        $collectionSize = $collection->getSize();

        try {
                foreach ($collection as $popup) {
                    $popup->setIsActive(PopupInterface::DISABLED);
                    $this->popupRepository->save($popup);
                }
                $this->messageManager->addSuccessMessage(
                    __('A total of %1 record(s) have been deleted.', $collectionSize)
                );
        } catch (\Throwable $e) {
            $this->messageManager->addErrorMessage(
                __('An error occurred while disabling the popups')
            );
        }


        $result = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        return $result->setPath('magemastery_popup/popup/index');

    }
}
