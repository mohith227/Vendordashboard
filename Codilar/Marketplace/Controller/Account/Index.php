<?php
/**
 * Created by PhpStorm.
 * User: mohith
 * Date: 28/8/18
 * Time: 8:25 AM
 */
namespace Codilar\Marketplace\Controller\Account;


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

        echo "This is from index account";
        if($this->_session->isLoggedIn()){
            print_r($this->_session->getCustomer()->getIsVendor());
            return $this->_pageFactory->create();
        }
        else{
            return $this->_pageFactory->create();
        }

    }
}