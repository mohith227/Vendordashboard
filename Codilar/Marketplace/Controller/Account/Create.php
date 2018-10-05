<?php
/**
 * Created by PhpStorm.
 * User: mohith
 * Date: 28/8/18
 * Time: 8:36 AM
 */
namespace Codilar\Marketplace\Controller\Account;


use Magento\Customer\Model\ResourceModel\Customer;
use Magento\Framework\App\Action\Context;

class Create extends \Magento\Framework\App\Action\Action
{

    protected $_pageFactory;
    protected $_vendorFactory;
    protected $_collectionFactory;
    protected $_session;
    protected $_customerRepositoryInterface;


    /**
     * Create constructor.
     * @param Context $context
     * @param \Magento\Framework\View\Result\PageFactory $pageFactory
     * @param \Codilar\Marketplace\Model\VendorFactory $vendorFactory
     * @param Customer\CollectionFactory $collectionFactory
     * @param \Magento\Customer\Api\CustomerRepositoryInterface $customerRepositoryInterface
     * @param \Magento\Customer\Model\Session $session
     */
    public function __construct(
        Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magento\Customer\Api\CustomerRepositoryInterface $customerRepositoryInterface,
        \Magento\Customer\Model\Session $session
    )
    {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
    }


    /**
     * Execute action based on request and return result
     *
     * Note: Request will be added as operation argument in future
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        $page = $this->pageFactory->create();
        return $page;
    }
    
}