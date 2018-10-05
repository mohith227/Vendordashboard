<?php
/**
 * Created by PhpStorm.
 * User: Navaneeth Vijay
 * Date: 9/4/2018
 * Time: 7:12 PM
 */

namespace Codilar\Marketplace\Cron;


use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

class Example extends Action
{
    protected $_logger;

//    protected $_pageFactory;

    protected $_orderFactory;

    public function __construct(Context $context,
                                \Psr\Log\LoggerInterface $logger,
                                \Magento\Sales\Model\OrderFactory $orderFactory
//                                \Magento\Framework\View\Result\PageFactory $pageFactory
    )
    {
        $this->_logger = $logger;
//        $this->_pageFactory = $pageFactory;
        $this->_orderFactory = $orderFactory;
        parent::__construct($context);
    }

    public function execute()
    {

        $orderDetails = $this->_orderFactory->create();

        $details = $orderDetails ->getCollection()
            ->addFieldToSelect('*')
            ->load();

        $this->_logger->info('No orders available');

        if(count($orderDetails) == 0){
            $this->_logger->info('No orders available');
            return $this;
        }
        $this->_logger->info('orders are available');

            foreach ($details as $order){
              if($order->getData('status') == 'pending'){
                  $order->setData('status', 'completed');
                  $order->save();
                  $this->_logger->info('complete');
              }
//              else{
//                  $order->setData('status', 'pending');
//                  $order->save();
//                  $this->_logger->info('pending');
//              }
            }
       return $this;

    }

}