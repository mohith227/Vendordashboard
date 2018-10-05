<?php
/**
 * Created by PhpStorm.
 * User: Navaneeth Vijay
 * Date: 9/3/2018
 * Time: 5:28 PM
 */

namespace Codilar\Vendorplace\Controller\Adminhtml\Seller;
use Codilar\Marketplace\Model\Vendor as Vendor;

class NewAction extends \Magento\Backend\App\Action
{
    /**
     * Edit A Contact Page
     *
     * @return \Magento\Backend\Model\View\Result\Page|\Magento\Backend\Model\View\Result\Redirect
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
        print_r("hello");
        $this->_view->loadLayout();
        $this->_view->renderLayout();
        $contactDatas = $this->getRequest()->getParam('contact');
        if(is_array($contactDatas)) {
            $contact = $this->_objectManager->create(Vendor::class);
            $contact->setData($contactDatas)->save();
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('*/*/index');
        }
    }
}