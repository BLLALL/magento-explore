<?php
declare(strict_types=1);

namespace MageMastery\News\Model;

use MageMastery\News\Api\Data\ArticleInterface;
use MageMastery\News\Model\ResourceModel\Article as ArticleResourceModel;
use Magento\Framework\Model\AbstractModel;

class Article extends AbstractModel implements ArticleInterface
{
    protected function _construct()
    {
        $this->_eventPrefix = 'magemastery_news_article';
        $this->_eventObject = 'article';
        $this->_idFieldName = 'article_id';
        $this->_init(ArticleResourceModel::class);
    }

    public function getArticleId(): ?int
    {
        return $this->getData('article_id') === null ? null : (int)$this->getData('article_id');
    }

    public function setArticleId(int $articleId): void
    {
        $this->setData('article_id', $articleId);
    }

    public function getTitle(): string
    {
        return (string)$this->getData('title');
    }

    public function setTitle(string $title): void
    {
        $this->setData('title', $title);
    }
    
    public function getCategoryIds(): array
    {
        if (!$this->hasData('category_ids')) {
            $ids = $this->getResource()->getCategoryIds($this);
            $this->setData('category_ids', $ids);
        }
        return (array)$this->_getData('category_ids');
    }

    public function getContent(): string
    {
        return (string)$this->getData('content');
    }

    public function setContent(string $content): void
    {
        $this->setData('content', $content);
    }

    public function getCreatedAt(): string
    {
        return (string)$this->getData('created_at');
    }

    public function setCreatedAt(string $createdAt): void
    {
        $this->setData('created_at', $createdAt);
    }

    public function getUpdatedAt(): string
    {
        return (string)$this->getData('updated_at');
    }

    public function setUpdatedAt(string $updatedAt): void
    {
        $this->setData('updated_at', $updatedAt);
    }
}