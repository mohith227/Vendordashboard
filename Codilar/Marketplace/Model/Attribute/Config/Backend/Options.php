<?php
/**
 * Created by PhpStorm.
 * User: Navaneeth Vijay
 * Date: 9/2/2018
 * Time: 12:08 AM
 */

namespace Codilar\Marketplace\Model\Attribute\Config\Backend;

use Magento\Framework\Exception\LocalizedException;
use Magento\Eav\Model\Entity\Attribute\Backend\AbstractBackend;

class Options extends  AbstractBackend
{
    protected $_vendorFactory;
    protected $_authSession;

    /**
     * Options constructor.
     * @param \Codilar\Marketplace\Model\VendorFactory $vendorFactory
     * @param \Magento\Backend\Model\Auth\Session $authSession
     */
    public function __construct(
        \Codilar\Marketplace\Model\VendorFactory $vendorFactory,
        \Magento\Backend\Model\Auth\Session $authSession
    )
    {
        $this->_vendorFactory = $vendorFactory;
        $this->_authSession = $authSession;

    }

    public function beforeSave($object)
    {
        $vendorObj = $this->_vendorFactory->create();
        $userId = $this->_authSession->getUser()->getUserId();
        $aclRole = $this->_authSession->getUser()->getAclRole();
        if($aclRole == 5){
            $vendor = $vendorObj->getCollection()->addFieldToFilter('user_id', $userId)->getData();
            $name = $vendor[0]['shop_name'];
            $object->setData('vendor_name', $name);
        }
        else{
            $object->setData('vendor_name', 'Admin');
        }
    }
}