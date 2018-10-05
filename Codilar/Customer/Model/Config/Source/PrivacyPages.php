<?php
/**
 * Codilar Technologies Pvt. Ltd.
 * @category    [CATEGORY NAME]
 * @package    [PACKAGE NAME]
 * @copyright   Copyright (c) 2016 Codilar. (http://www.codilar.com)
 * @purpose     [BRIEF ABOUT THE FILE]
 * @author       Codilar Team
 **/

namespace Codilar\Customer\Model\Config\Source;

class PrivacyPages implements \Magento\Framework\Option\ArrayInterface
{ 
    /**
     * Return array of options as value-label pairs, eg. value => label
     *
     * @return array
     */
    public function toOptionArray()
    {
        $res = array();
	    $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
 	    $collection = $objectManager->get('\Magento\Cms\Model\ResourceModel\Page\CollectionFactory')->create();
  	    $collection->addFieldToFilter('is_active' , \Magento\Cms\Model\Page::STATUS_ENABLED);		
		foreach($collection as $page){
		   $data['value'] = $page->getData('identifier');
	           $data['label'] = $page->getData('title');
		   $res[] = $data;
		} 
		return $res;
    }
}






