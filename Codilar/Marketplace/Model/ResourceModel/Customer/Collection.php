<?php
/**
 * Created by PhpStorm.
 * User: Navaneeth Vijay
 * Date: 8/23/2018
 * Time: 11:54 PM
 */

namespace Codilar\Marketplace\Model\ResourceModel\Customer;


class Collection extends \Magento\Customer\Model\ResourceModel\Customer\Collection
{
   public function __construct(\Magento\Framework\Data\Collection\EntityFactory $entityFactory, \Psr\Log\LoggerInterface $logger, \Magento\Framework\Data\Collection\Db\FetchStrategyInterface $fetchStrategy, \Magento\Framework\Event\ManagerInterface $eventManager, \Magento\Eav\Model\Config $eavConfig, \Magento\Framework\App\ResourceConnection $resource, \Magento\Eav\Model\EntityFactory $eavEntityFactory, \Magento\Eav\Model\ResourceModel\Helper $resourceHelper, \Magento\Framework\Validator\UniversalFactory $universalFactory, \Magento\Framework\Model\ResourceModel\Db\VersionControl\Snapshot $entitySnapshot, \Magento\Framework\DataObject\Copy\Config $fieldsetConfig, \Magento\Framework\DB\Adapter\AdapterInterface $connection = null, $modelName = \Magento\Customer\Model\ResourceModel\Customer\Collection::CUSTOMER_MODEL_NAME)
   {
       \Magento\Customer\Model\ResourceModel\Customer\Collection::__construct($entityFactory, $logger, $fetchStrategy, $eventManager, $eavConfig, $resource, $eavEntityFactory, $resourceHelper, $universalFactory, $entitySnapshot, $fieldsetConfig, $connection, $modelName);
   }

    public function getVendors(){
//       $list = array();
       $collection = $this->addFieldToFilter('group_id', 1);
        foreach($collection as $item){
            echo "<pre>";
            print_r($item->getData());
            echo "</pre>";
        }
    }
}