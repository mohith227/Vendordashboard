<?php
/**
 * Codilar Technologies Pvt. Ltd.
 * @category    [CATEGORY NAME]
 * @package    [PACKAGE NAME]
 * @copyright   Copyright (c) 2016 Codilar. (http://www.codilar.com)
 * @purpose     [BRIEF ABOUT THE FILE]
 * @author       Codilar Team
 **/
namespace Codilar\Marketplace\Block\Vendors;


use Magento\Framework\View\Element\Template;

class Index extends Template
{
    protected $_vendorFactory;

    protected $_productFactory;

    public function __construct(\Magento\Framework\View\Element\Template\Context $context,
                                \Codilar\Marketplace\Model\VendorFactory $vendorFactory,
                                \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productFactory
)
    {
        $this->_productFactory = $productFactory;
        $this->_vendorFactory = $vendorFactory;
        parent::__construct($context);
    }

    public function getVendors()
    {
       $vendors = $this->_vendorFactory->create();
          return ($vendors->getCollection()->getData());
    }
}