<?php
/**
 * Created by PhpStorm.
 * User: Navaneeth Vijay
 * Date: 9/3/2018
 * Time: 1:10 PM
 */

namespace Codilar\Marketplace\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Exception\LocalizedException;


class SalesOrderSaveAfter implements ObserverInterface
{
    /**
     * @var \Magento\Framework\ObjectManagerInterface
     */
    protected $_objectManager;

    protected $_logger;

    protected $_pageFactory;
    protected $_vendorFactory;
    protected $_itemFactory;
    protected $_orderFactory;
    protected $_productFactory;

    protected $pid;

    /**
     * @var \Magento\Framework\UrlInterface
     */
    protected $_urlInterface;

    /**
     * SalesOrderSaveAfter constructor.
     * @param \Magento\Framework\ObjectManagerInterface $objectManager
     * @param \Magento\Framework\UrlInterface $urlInterface
     * @param \Psr\Log\LoggerInterface $loggerInterface
     * @param \Codilar\Marketplace\Model\VendorFactory $vendorFactory
     * @param \Magento\Sales\Model\ResourceModel\Order\Item\CollectionFactory $itemFactory
     * @param \Magento\Sales\Model\ResourceModel\Order\CollectionFactory $orderFactory
     * @param \Magento\Catalog\Model\ProductFactory $productFactory
     */
    public function __construct(
        \Magento\Framework\ObjectManagerInterface $objectManager,
        \Magento\Framework\UrlInterface $urlInterface,
        \Psr\Log\LoggerInterface $loggerInterface,
        \Codilar\Marketplace\Model\VendorFactory $vendorFactory,
        \Magento\Sales\Model\ResourceModel\Order\Item\CollectionFactory $itemFactory,
        \Magento\Sales\Model\ResourceModel\Order\CollectionFactory $orderFactory,
        \Magento\Catalog\Model\ProductFactory $productFactory
    ) {
        $this->_logger = $loggerInterface;
        $this->_vendorFactory = $vendorFactory;
        $this->_itemFactory = $itemFactory;
        $this->_orderFactory = $orderFactory;
        $this->_productFactory = $productFactory;
        $this->_objectManager = $objectManager;
        $this->_urlInterface = $urlInterface;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {

        $order =  $observer->getEvent()->getOrder();
        $orderId = $observer->getEvent()->getOrder()->getId();

        $this->_logger->info('order id:'.$orderId);

        foreach ($order->getAllItems() as $item) {

            $this->pid=$item->getProductId();
            $this->_logger->info('Product Id: '. $this->pid);
        }

        $orderTotal = $order->getGrandTotal();

//        // getting the vendor name
        $productObj = $this->_productFactory->create();
        $vendorName = $productObj->getCollection()
            ->addFieldToFilter('entity_id', $this->pid)
            ->addFieldToSelect('*')
            ->getFirstItem()
            ->getData('vendor_name');

//        //updating the vendor sales and commission
        $vendor = $this->_vendorFactory->create()
            ->getCollection()
            ->addFieldToFilter('shop_name', $vendorName)
            ->getFirstItem();

        $commissionRate = $vendor->getData('commission');

        $prevSales = $vendor->getData('sales');

        $newSales= $prevSales+$orderTotal;
        $commission = $newSales * $commissionRate * 0.01;

        $this->_vendorFactory->create()
            ->getCollection()
            ->addFieldToFilter('shop_name', $vendorName)
            ->getFirstItem()
            ->setData('sales', $newSales)
            ->setData('commission_amount', $commission)
            ->save();

    }
}