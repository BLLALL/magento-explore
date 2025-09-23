<?php
namespace MageMastery\Jobs\Controller\Cookie;

use \Magento\Framework\App\Action\Action;

class Testaddcookie extends Action {
    const JOB_COOKIE_NAME = 'jobs';

    const JOB_COOKIE_DURATION = 86400;

    protected \Magento\Framework\Stdlib\CookieManagerInterface $_cookieManager;

    protected \Magento\Framework\Stdlib\Cookie\CookieMetadataFactory $_cookieMetadataFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\Stdlib\CookieManagerInterface $cookieManager,
        \Magento\Framework\Stdlib\Cookie\CookieMetadataFactory $cookieMetadataFactory
    )
    {
        $this->_cookieManager = $cookieManager;
        $this->_cookieMetadataFactory = $cookieMetadataFactory;
        parent::__construct($context);
    }


    public function execute()
    {
        $metadata = $this->_cookieMetadataFactory
            ->createPublicCookieMetadata()
            ->setDuration(self::JOB_COOKIE_DURATION);

        $this->_cookieManager->setPublicCookie(self::JOB_COOKIE_NAME, 'JOB COOKIE', $metadata);

        echo ('COOKIE IS OK');
    }

}
