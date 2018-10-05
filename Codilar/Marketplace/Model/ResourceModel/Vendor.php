<?php
/**
 * Created by PhpStorm.
 * User: Navaneeth Vijay
 * Date: 8/26/2018
 * Time: 3:50 PM
 */

namespace Codilar\Marketplace\Model\ResourceModel;


class Vendor extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected $_idFieldName = 'vendor_id';
    protected $_date;


    /**
     * Vendor constructor.
     * @param \Magento\Framework\Model\ResourceModel\Db\Context $context
     * @param \Magento\Framework\Stdlib\DateTime\DateTime $date
     * @param null $resourcePrefix
     */
    public function __construct(\Magento\Framework\Model\ResourceModel\Db\Context $context,
                                \Magento\Framework\Stdlib\DateTime\DateTime $date,
                                $resourcePrefix = null)
    {
        parent::__construct($context, $resourcePrefix);
        $this->_date = $date;
    }
    protected function _construct()
    {
        $this->_init('marketplace_vendors', 'vendor_id');
    }
}