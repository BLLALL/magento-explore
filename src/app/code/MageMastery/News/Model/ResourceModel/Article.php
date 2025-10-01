<?php
declare(strict_types=1);

namespace MageMastery\News\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\AbstractModel;

class Article extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('news_articles', 'article_id');
    }

    protected function _afterSave(AbstractModel $object)
    {
        $this->saveCategoryIds($object);
        return parent::_afterSave($object);
    }

    public function getCategoryIds(AbstractModel $object): array
    {
        $adapter = $this->getConnection();
        $select = $adapter->select()
            ->from($this->getTable('news_article_category'), 'category_id')
            ->where('article_id = ?', (int)$object->getId());

        return $adapter->fetchCol($select);
    }

    private function saveCategoryIds(AbstractModel $object): void
    {
        $adapter = $this->getConnection();
        $adapter->delete(
            $this->getTable('news_article_category'),
            ['article_id = ?' => (int)$object->getId()]
        );
        
        $categoryIds = $object->getCategoryIds();
        if (!empty($categoryIds)) {
            $data = [];
            foreach ($categoryIds as $categoryId) {
                $data[] = [
                    'article_id' => (int)$object->getId(),
                    'category_id' => (int)$categoryId,
                ];
            }
            $adapter->insertMultiple($this->getTable('news_article_category'), $data);
        }
    }
}