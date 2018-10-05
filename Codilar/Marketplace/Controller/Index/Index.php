<?php
/**
 * Created by PhpStorm.
 * User: mohith
 * Date: 28/8/18
 * Time: 8:05 AM
 */
namespace Codilar\Marketplace\Controller\Index;


class Index extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;
    protected $_vendorFactory;
    protected $_session;


    /**
     * Index constructor.
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $pageFactory
     * @param \Codilar\Marketplace\Model\VendorFactory $vendorFactory
     * @param \Magento\Customer\Model\Session $session
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Codilar\Marketplace\Model\VendorFactory $vendorFactory,
        \Magento\Customer\Model\Session $session
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->_vendorFactory = $vendorFactory;
        $this->_session = $session;
        return parent::__construct($context);
    }

    public function execute()
    {
                $this->_redirect('marketplace/account/create');
                return $this->_pageFactory->create();
    }
}