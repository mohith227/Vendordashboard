<?php
/**
 * Created by PhpStorm.
 * User: Navaneeth Vijay
 * Date: 8/21/2018
 * Time: 12:47 PM
 */

namespace Codilar\Vendorplace\Controller\Adminhtml\Product;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     * @var \Magento\Backend\Model\View\Result\Page
     */
    protected $resultPage;

    /**
     * @param Context       $context
     * @param PageFactory   $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Seller list page.
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
//        print_r("hello");
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Codilar_Vendorplace::vendorproduct');
        $resultPage->getConfig()->getTitle()->prepend(__('Manage Product'));
        return $resultPage;
    }
    /**
     * Check for is allowed.
     *
     * @return boolean
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Codilar_Vendorplace::manageproduct');
    }
}
