<?php
/**
 * Created by PhpStorm.
 * User: Navaneeth Vijay
 * Date: 9/4/2018
 * Time: 12:49 AM
 */

namespace Codilar\Marketplace\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Exception\LocalizedException;

class SalesOrderSaveBefore implements ObserverInterface
{
    /**
     * @var \Magento\Framework\ObjectManagerInterface
     */
    protected $_objectManager;

    protected $_logger;

    public function __construct(
        \Magento\Framework\ObjectManagerInterface $objectManager,
        \Psr\Log\LoggerInterface $loggerInterface
    ) {
        $this->_logger = $loggerInterface;
        $this->_objectManager = $objectManager;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $order = $observer->getEvent()->getOrder();
       $order->setVendorName($order->getOrderId());

    }
}