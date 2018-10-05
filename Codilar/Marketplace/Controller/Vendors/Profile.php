<?php
/**
 * Created by PhpStorm.
 * User: Navaneeth Vijay
 * Date: 9/3/2018
 * Time: 8:14 PM
 */

namespace Codilar\Marketplace\Controller\Vendors;

use Magento\Framework\App\Action\Action;

class Profile extends Action
{
    protected $_pageFactory;
    protected $_vendorFactory;


    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Codilar\Marketplace\Model\VendorFactory $vendorFactory
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->_vendorFactory = $vendorFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $this->getRequest()->getParams();

        return $this->_pageFactory->create();
    }
}