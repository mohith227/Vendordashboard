<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Codilar\Vendorplace\Ui\DataProvider\Product;

use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;

/**
 * Class ProductDataProvider
 *
 * @api
 * @since 100.0.2
 */
class ProductDataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * Product collection
     *
     * @var \Magento\Catalog\Model\ResourceModel\Product\Collection
     */
    protected $collection;

    /**
     * @var \Magento\Ui\DataProvider\AddFieldToCollectionInterface[]
     */
    protected $addFieldStrategies;

    /**
     * @var \Magento\Ui\DataProvider\AddFilterToCollectionInterface[]
     */
    protected $addFilterStrategies;

    protected $_authSession;

    protected $_vendorName;

    protected $userId;

    protected $aclRole;

    protected $_vendorFactory;

    protected $items;

    /**
     * Construct
     *
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $collectionFactory
     * @param \Magento\Ui\DataProvider\AddFieldToCollectionInterface[] $addFieldStrategies
     * @param \Magento\Ui\DataProvider\AddFilterToCollectionInterface[] $addFilterStrategies
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        \Codilar\Marketplace\Model\VendorFactory $vendorFactory,
        \Magento\Backend\Model\Auth\Session $authSession,
        array $addFieldStrategies = [],
        array $addFilterStrategies = [],
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->_authSession = $authSession;
        $this->_vendorFactory = $vendorFactory;
        $this->collection = $collectionFactory->create();

        $this->addFieldStrategies = $addFieldStrategies;
        $this->addFilterStrategies = $addFilterStrategies;



    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        $vendorObj = $this->_vendorFactory->create();
        $this->userId = $this->_authSession->getUser()->getUserId();
        $this->aclRole = $this->_authSession->getUser()->getAclRole();

        if($this->aclRole == 5){
            $vendor = $vendorObj->getCollection()->addFieldToFilter('user_id', $this->userId)->getData();
            $this->_vendorName = $vendor[0]['shop_name'];

            if (!$this->getCollection()->isLoaded()) {
                $this->items = $this->getCollection()
                    ->addFieldToSelect('*')
                    ->addFieldToFilter('vendor_name', $this->_vendorName)
                    ->load();
            }
        }
        else{
            if (!$this->getCollection()->isLoaded()) {
                $this->items = $this->getCollection()
                    ->addFieldToSelect('*')
                    ->load();
            }
        }

        $items = $this->getCollection()->toArray();

        return [
            'totalRecords' => $this->getCollection()->getSize(),
            'items' => array_values($items),
        ];
    }

    /**
     * Add field to select
     *
     * @param string|array $field
     * @param string|null $alias
     * @return void
     */
    public function addField($field, $alias = null)
    {
        if (isset($this->addFieldStrategies[$field])) {
            $this->addFieldStrategies[$field]->addField($this->getCollection(), $field, $alias);
        } else {
            parent::addField($field, $alias);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function addFilter(\Magento\Framework\Api\Filter $filter)
    {
        print_r($filter);
        if (isset($this->addFilterStrategies[$filter->getField()])) {
            $this->addFilterStrategies[$filter->getField()]
                ->addFilter(
                    $this->getCollection(),
                    $filter->getField(),
                    [$filter->getConditionType() => $filter->getValue()]
                );
        } else {
            parent::addFilter($filter);
        }
    }
}