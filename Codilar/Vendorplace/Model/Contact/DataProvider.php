<?php
/**
 * Created by PhpStorm.
 * User: Navaneeth Vijay
 * Date: 9/3/2018
 * Time: 5:32 PM
 */

namespace Codilar\Vendorplace\Model\Contact;

use Codilar\Marketplace\Model\ResourceModel\Vendor\CollectionFactory;
class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $contactCollectionFactory
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $contactCollectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $contactCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }

        $items = $this->collection->getItems();
        $this->loadedData = array();

        /** @var Customer $customer */
        foreach ($items as $contact) {
            $this->loadedData[$contact->getId()]['account'] = $contact->getData();
            $this->loadedData[$contact->getId()]['shop'] = $contact->getData();
        }

        return $this->loadedData;

    }
}