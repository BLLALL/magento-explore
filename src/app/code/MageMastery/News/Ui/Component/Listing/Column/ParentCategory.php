<?php
declare(strict_types=1);

namespace MageMastery\News\Ui\Component\Listing\Column;

use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

class ParentCategory extends Column
{
    /**
     * @var UrlInterface
     */
    protected $urlBuilder;

    /**
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param UrlInterface $urlBuilder
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        array $components = [],
        array $data = []
    ) {
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource): array
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                $parentId = $item['parent_id'] ?? null;

                if ($parentId) {
                    // Instead of filtering, link directly to edit the parent category
                    $url = $this->urlBuilder->getUrl(
                        'news/categories/edit',
                        ['id' => $parentId]
                    );
                    
                    $item[$this->getData('name')] = sprintf(
                        '<a href="%s">%d</a>',
                        $url,
                        $parentId
                    );
                } else {
                    // If there is no parent_id, display NULL
                    $item[$this->getData('name')] = 'NULL';
                }
            }
        }

        return $dataSource;
    }
}