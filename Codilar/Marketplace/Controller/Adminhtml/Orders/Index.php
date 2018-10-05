<?php
/**
 * Created by PhpStorm.
 * User: Navaneeth Vijay
 * Date: 8/21/2018
 * Time: 12:47 PM
 */

namespace Codilar\Marketplace\Controller\Adminhtml\Orders;


class Index extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;
    protected $_session;


    /**
     * Index constructor.
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $pageFactory
     * @param \Magento\Customer\Model\Session $session
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magento\Customer\Model\Session $session
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->_session = $session;
        return parent::__construct($context);
    }

    public function execute()
    {
        $resultPage = $this->_pageFactory->create();
        $resultPage->setActiveMenu('Codilar_Marketplace::Marketplace');
        $resultPage->getConfig()->getTitle()->prepend((__('Manage Orders')));
        return $resultPage;

    }
}