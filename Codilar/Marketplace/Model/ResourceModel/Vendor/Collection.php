<?php
/**
 * Created by PhpStorm.
 * User: Navaneeth Vijay
 * Date: 8/26/2018
 * Time: 3:53 PM
 */

namespace Codilar\Marketplace\Model\ResourceModel\Vendor;

use Magento\Framework\Data\Collection\EntityFactoryInterface;
use Psr\Log\LoggerInterface;
use Magento\Framework\Data\Collection\Db\FetchStrategyInterface;
use Magento\Framework\Event\ManagerInterface;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\DB\Adapter\AdapterInterface;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'vendor_id';

    /**
     * @param EntityFactoryInterface $entityFactory,
     * @param LoggerInterface        $logger,
     * @param FetchStrategyInterface $fetchStrategy,
     * @param ManagerInterface       $eventManager,
     * @param StoreManagerInterface  $storeManager,
     * @param AdapterInterface       $connection,
     * @param AbstractDb             $resource
     */
    public function __construct(
        EntityFactoryInterface $entityFactory,
        LoggerInterface $logger,
        FetchStrategyInterface $fetchStrategy,
        ManagerInterface $eventManager,
        StoreManagerInterface $storeManager,
        AdapterInterface $connection = null,
        AbstractDb $resource = null
    ) {
        $this->_init('Codilar\Marketplace\Model\Vendor', 'Codilar\Marketplace\Model\ResourceModel\Vendor');
        //Class naming structure
        // 'NameSpace\ModuleName\Model\ModelName', 'NameSpace\ModuleName\Model\ResourceModel\ModelName'
        parent::__construct($entityFactory, $logger, $fetchStrategy, $eventManager, $connection, $resource);
        $this->storeManager = $storeManager;
    }

//    protected function _initSelect()
//    {
//        parent::_initSelect();
//        $this->getSelect()->joinLeft(
//            ['secondTable' => $this->getTable('admin_user')],
//            //'secondTable.entity_id = main_Table.customer_id',
//                'main_table.user_id = secondTable.user_id' ,
//            '*'
//        );
//    }
//    protected function _renderFiltersBefore() {
//        $joinTable = $this->getTable('customer_grid_flat');
//
//        $this->getSelect()->JoinLeft($joinTable.' as secondtable','main_Table.customer_id = secondTable.entity_id', '*');
//        parent::_renderFiltersBefore();
//    }
}
