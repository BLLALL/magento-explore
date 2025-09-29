<?php
declare(strict_types=1);

namespace MageMastery\News\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Article extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('news_articles', 'article_id');
    }   
}