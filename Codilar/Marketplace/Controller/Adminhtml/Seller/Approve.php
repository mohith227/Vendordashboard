<?php
/**
 * Created by PhpStorm.
 * User: Navaneeth Vijay
 * Date: 8/21/2018
 * Time: 12:47 PM
 */

namespace Codilar\Marketplace\Controller\Adminhtml\Seller;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Approve extends \Magento\Framework\App\Action\Action
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
        $vendor = $vendorObj->load($vendorId)->getData();

        $userObj = $this->_userFactory->create();
        $userObj->setData(array(
            'username'  => $vendor['user_name'],
            'firstname' => $vendor['first_name'],
            'lastname'  => $vendor['last_name'],
            'email'     => $vendor['email'],
            'password'  => $vendor['password'],
            'is_active' => 1,
            'role_id' => 7
        ))->save();

        $userId = $userObj->loadByUsername($vendor['user_name'])->getUserId();
        print_r($userId);

        $vendorObj->load($vendorId)
            ->setData('user_id', $userId)
            ->save();

        $this->_redirect('marketplace/seller/index');
        return $this->_pageFactory->create();
    }
}
