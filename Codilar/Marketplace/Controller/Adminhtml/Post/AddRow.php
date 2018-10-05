<?php
/**
 * Created by PhpStorm.
 * User: mohith
 * Date: 28/8/18
 * Time: 11:32 AM
 */
namespace Codilar\Marketplace\Controller\Adminhtml\Post;
use Magento\Framework\Controller\ResultFactory;
class AddRow extends \Magento\Backend\App\Action
{
    /**
     * @var \Magento\Framework\Registry
     */
    private $coreRegistry;
    /**
     * @var \Codilar\Marketplace\Model\VendorFactory
     */
    private $vendorFactory;
    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry,
     * @param \Codilar\Marketplace\Model\VendorFactory $vendorFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Codilar\Marketplace\Model\VendorFactory $vendorFactory
    ) {
        parent::__construct($context);
        $this->coreRegistry = $coreRegistry;
        $this->vendorFactory = $vendorFactory;
    }
    /**
     * Mapped Grid List page.
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        $rowId = (int) $this->getRequest()->getParam('1');
        //print_r($rowId);
        $rowData = $this->vendorFactory->create();
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        if (!$rowId) {
            //$rowData = $rowData->load($rowId);
            $rowTitle = $rowData->getTitle();
            if (!$rowData->getEntityId()) {
                $this->messageManager->addError(__('row data no longer exist.'));
                $this->_redirect('vendor/post/rowdata');
                return;
            }
        }
        $this->coreRegistry->register('row_data', $rowData);
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $title = $rowId ? __('Edit Row Data ').$rowTitle : __('Add Row Data');
        $resultPage->getConfig()->getTitle()->prepend($title);
        return $resultPage;
    }
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Codilar_Marketplace::add_row');
    }
}
