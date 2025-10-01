<?php
declare(strict_types=1);

namespace MageMastery\News\Model\ResourceModel\Article\Grid;

use Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult;

class Collection extends SearchResult
{
  
    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        parent::_construct();
        // Map filters to the correct database columns
        $this->addFilterToMap('article_id', 'main_table.article_id');
        $this->addFilterToMap('categories', 'nc.name');
    }
    protected function _initSelect()
    {
        parent::_initSelect();

        // Join the link table (news_article_category)
        $this->getSelect()->joinLeft(
            ['nac' => $this->getTable('news_article_category')],
            'main_table.article_id = nac.article_id',
            []
        );

        // Join the category data table (news_categories)
        $this->getSelect()->joinLeft(
            ['nc' => $this->getTable('news_categories')],
            'nac.category_id = nc.category_id',
            // Use GROUP_CONCAT to aggregate category names into a single string
            ['categories' => new \Zend_Db_Expr("GROUP_CONCAT(nc.name SEPARATOR ', ')")]
        );

        // Group the results by the article's primary key to avoid duplicate rows
        $this->getSelect()->group('main_table.article_id');

        return $this;
    }
}