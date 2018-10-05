<?php
/**
 * Created by PhpStorm.
 * User: mohith
 * Date: 30/8/18
 * Time: 11:52 AM
 */
namespace Codilar\Marketplace\Controller\Account;


use Magento\Customer\Model\ResourceModel\Customer;
use Magento\Framework\App\Action\Context;

class Newaccount extends \Magento\Framework\App\Action\Action
{

    protected $_pageFactory;
    protected $_vendorFactory;
    protected $_itemFactory;
    protected $_orderFactory;
    protected $_productFactory;


    public function __construct(
        Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Codilar\Marketplace\Model\VendorFactory $vendorFactory,
        \Magento\Sales\Model\ResourceModel\Order\Item\CollectionFactory $itemFactory,
        \Magento\Sales\Model\ResourceModel\Order\CollectionFactory $orderFactory,
        \Magento\Catalog\Model\ProductFactory $productFactory
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->_vendorFactory = $vendorFactory;
        $this->_itemFactory = $itemFactory;
        $this->_orderFactory = $orderFactory;
        $this->_productFactory = $productFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $orderItemObj = $this->_itemFactory->create();
        $item = $orderItemObj->addFieldToFilter('order_id', 36)
            ->getFirstItem()
            ->getData('product_id');

        print_r($item);
        $productId = $item;

//        // getting the vendor name
//        $productObj = $this->_productFactory->create();
//
//        $vendorName = $productObj->getCollection()
//            ->addFieldToFilter('entity_id', $productId)
//            ->addFieldToSelect('*')
//            ->getFirstItem()
//            ->getData('vendor_name');
//
//        var_dump($vendorName);
//
//        //sales order grand total
//        $orderobj = $this->_orderFactory->create();
//        $orderTotal = $orderobj->addFieldToFilter('entity_id', 36)
//            ->getFirstItem()
//            ->getData('grand_total');
//
//
//        //updating the vendor sales and commission
//        $vendor = $this->_vendorFactory->create()
//            ->getCollection()
//            ->addFieldToFilter('shop_name', $vendorName)
//            ->getFirstItem();
//
//        $commissionRate = $vendor->getData('commission');
//
//        $prevSales = $vendor->getData('sales');
//        $newSales= $prevSales+$orderTotal;
//
//
//        $commission = $newSales * $commissionRate * 0.01;

//        $this->_vendorFactory->create()
//            ->getCollection()
//            ->addFieldToFilter('shop_name', $vendorName)
//            ->getFirstItem()
//            ->setData('sales', $newSales)
//            ->setData('commission_amount', $commission)
//            ->save();


    }
   
}
