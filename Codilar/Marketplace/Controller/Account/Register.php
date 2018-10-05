<?php
/**
 * Created by PhpStorm.
 * User: mohith
 * Date: 28/8/18
 * Time: 8:27 AM
 */
namespace Codilar\Marketplace\Controller\Account;

use Magento\Backend\App\AbstractAction as BackendAction;
use Magento\Backend\App\Action\Context as BackendActionContext;
use Magento\Framework\Controller\Result\Redirect as ResultRedirect;
use Magento\Framework\Notification\NotifierInterface as NotifierPool;

class Register extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;
    protected $_vendorFactory;
    protected $_userFactory;


    protected $notifierPool;


    /**
     * Register constructor.
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $pageFactory
     * @param \Codilar\Marketplace\Model\VendorFactory $vendorFactory
     * @param \Magento\User\Model\UserFactory $userFactory
     * @param NotifierPool $notifierPool
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Codilar\Marketplace\Model\VendorFactory $vendorFactory,
        \Magento\User\Model\UserFactory $userFactory,
        NotifierPool $notifierPool
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->_vendorFactory = $vendorFactory;
        $this->_userFactory = $userFactory;

        $this->notifierPool = $notifierPool;

        return parent::__construct($context);
    }

    public function execute()
    {

        $post = (array)$this->getRequest()->getPost();
//
//        $userModel = $this->_userFactory->create();
//        $userModel->setData(array(
//            'username'  => $post['username'],
//            'firstname' => $post['firstname'],
//            'lastname'  => $post['lastname'],
//            'email'     => $post['email'],
//            'password'  => $post['password'],
//            'is_active' => 0
//        ))->save();
//        $userId = $userModel->loadByUsername($post['username'])->getUserId();

        $this->notifierPool->addNotice('Vendor Registration',
            'A new user with name '. $post['username'] . 'was registered. Open for more details'
        );

        $vendorObj = $this->_vendorFactory->create();

        $vendorObj->setData(array(
            'user_name'  => $post['username'],
            'first_name' => $post['firstname'],
            'last_name'  => $post['lastname'],
            'email'     => $post['email'],
            'password'  => $post['password'],
            'shop_name' => $post['shopname'],
            'shop_url'  => $post['shopurl'],
//            'user_id' => $userId
        ))->save();

        $this->messageManager->addSuccessMessage(__('Succesfully Created your account, please check you email for more details.'));
        $this->_redirect('/mage');
        return $this->_pageFactory->create();
    }

}