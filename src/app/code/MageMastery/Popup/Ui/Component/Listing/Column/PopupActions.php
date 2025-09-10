<?php
declare(strict_types=1);

namespace MageMastery\Popup\Ui\Component\Listing\Column;

use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\Escaper;

class PopupActions extends Column
{
    private const URL_PATH_EDIT = 'popup/index/edit';
    private const URL_PATH_DELETE = 'popup/index/delete';

    protected UrlInterface $urlBuilder;
    private Escaper $escaper;
    private string $editUrl;

    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        Escaper $escaper,
        array $components = [],
        array $data = [],
        string $editUrl = self::URL_PATH_EDIT
    ) {
        $this->urlBuilder = $urlBuilder;
        $this->escaper = $escaper;
        $this->editUrl = $editUrl;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * @inheritDoc
     */
    public function prepareDataSource(array $dataSource): array
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                if (isset($item['popup_id'])) {
                    $name = $this->getData('name');
                    $popupName = $this->escaper->escapeHtml($item['name']);

                    $item[$name]['edit'] = [
                        'href' => $this->urlBuilder->getUrl($this->editUrl, ['popup_id' => $item['popup_id']]),
                        'label' => __('Edit'),
                    ];

                    $item[$name]['delete'] = [
                        'href' => $this->urlBuilder->getUrl(self::URL_PATH_DELETE, ['popup_id' => $item['popup_id']]),
                        'label' => __('Delete'),
                        'confirm' => [
                            'title' => __('Delete %1', $popupName),
                            'message' => __('Are you sure you want to delete the %1 record?', $popupName),
                        ],
                        'post' => true,
                    ];
                }
            }
        }

        return $dataSource;
    }
}
