<?php
/**
 * Codilar Technologies Pvt. Ltd.
 * @category    [CATEGORY NAME]
 * @package    [PACKAGE NAME]
 * @copyright   Copyright (c) 2016 Codilar. (http://www.codilar.com)
 * @purpose     [BRIEF ABOUT THE FILE]
 * @author       Codilar Team
 **/
namespace Codilar\Customer\Controller\Account;


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
        \Magento\Customer\Model\Session $session)
    {
        $this->_pageFactory = $pageFactory;
        $this->_session = $session;
        return parent::__construct($context);
    }

    public function execute()
    {
        $result = $this->_pageFactory->create();
        $result->getConfig()->getTitle()->prepend((__('My Dashboard')));
        return $result;

    }
}