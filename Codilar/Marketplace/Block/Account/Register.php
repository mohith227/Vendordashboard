<?php
/**
 * Codilar Technologies Pvt. Ltd.
 * @category    [CATEGORY NAME]
 * @package    [PACKAGE NAME]
 * @copyright   Copyright (c) 2016 Codilar. (http://www.codilar.com)
 * @purpose     [BRIEF ABOUT THE FILE]
 * @author       Codilar Team
 **/

namespace Codilar\Marketplace\Block\Account;


use Magento\Framework\View\Element\Template;

class Register extends Template
{
    protected $_userFactory;

    public function __construct(Template\Context $context,
                                \Magento\User\Model\UserFactory $userFactory,
                                array $data = [])
    {
        $this->_userFactory = $userFactory;
        parent::__construct($context, $data);
    }

    public function addToAdminUser(array $post)
    {

    }

}