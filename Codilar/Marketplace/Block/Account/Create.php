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

class Create extends Template
{

    public function __construct(Template\Context $context, array $data = [])
    {
        parent::__construct($context, $data);
    }

    public function getFormAction(){
        return '/mage/marketplace/account/register';
    }

}