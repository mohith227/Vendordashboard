<?php
/**
 * Created by PhpStorm.
 * User: mohith
 * Date: 28/8/18
 * Time: 1:36 PM
 */
namespace Codilar\Marketplace\Controller\Adminhtml\Post;
use phpDocumentor\Reflection\Types\This;

class Save extends \Magento\Backend\App\Action
{
    /**
     * @var \Codilar\Marketplace\Model\VendorFactory
     */
    var $vendorFactory;
    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Codilar\Marketplace\Model\VendorFactory $vendorFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Codilar\Marketplace\Model\VendorFactory $vendorFactory
    ) {
        parent::__construct($context);
        $this->vendorFactory = $vendorFactory;
    }
    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
        $vendorObj = $this->_vendorFactory->create();
        $vendor = $vendorObj->load(12)->getShopName();
        print_r($vendor);

        $resultPage = $this->_pageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend((__('Manage Vendors')));
        return $resultPage;

    }
}