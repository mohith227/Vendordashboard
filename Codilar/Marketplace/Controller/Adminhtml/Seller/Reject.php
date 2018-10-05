<?php
/**
 * Created by PhpStorm.
 * User: Navaneeth Vijay
 * Date: 8/31/2018
 * Time: 11:37 AM
 */

namespace Codilar\Marketplace\Controller\Adminhtml\Seller;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Reject extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;
    protected $_userFactory;
    protected $_vendorFactory;
    protected $_session;


    /**
     * Approve constructor.
     * @param \Magento\Framework\App\Action\Context $context
     * @param PageFactory $pageFactory
     * @param \Magento\User\Model\UserFactory $userFactory
     * @param \Codilar\Marketplace\Model\VendorFactory $vendorFactory
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        PageFactory $pageFactory,
        \Magento\User\Model\UserFactory $userFactory,
        \Codilar\Marketplace\Model\VendorFactory $vendorFactory
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->_userFactory = $userFactory;
        $this->_vendorFactory = $vendorFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $vendorId = $this->getRequest()->getParam('id');
        $vendorObj = $this->_vendorFactory->create();
        $vendorUserId = $vendorObj->load($vendorId)->getData('user_id');

        $this->_userFactory->create()->load($vendorUserId)->delete();

        $this->_redirect('marketplace/seller/index');
        return $this->_pageFactory->create();
    }
}