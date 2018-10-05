<?php

namespace Codilar\Marketplace\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Customer\Setup\CustomerSetupFactory;
use Codilar\Marketplace\Model\Attribute\Config\Backend\Options as Backend;
use Magento\Customer\Model\Customer;
use Magento\Eav\Model\Entity\Attribute\Set as AttributeSet;
use Magento\Eav\Model\Entity\Attribute\SetFactory as AttributeSetFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;


class InstallData implements \Magento\Framework\Setup\InstallDataInterface
{

    /**
     * @var EavSetupFactory
     */
    private $eavSetupFactory;

    /**
     * @var AttributeSetFactory
     */
    private $attributeSetFactory;

    /**
     * @param AttributeSetFactory $attributeSetFactory
     */
    public function __construct(
        EavSetupFactory $eavSetupFactory,
        AttributeSetFactory $attributeSetFactory
    ) {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->attributeSetFactory = $attributeSetFactory;
    }


    /**
     * {@inheritdoc}
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        /**
         *  Product attributes
         */

        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);

        $eavSetup->addAttribute(
        \Magento\Catalog\Model\Product::ENTITY,
        'vendor_name',
        [
            'group' => 'Product Details',/* Group name in which you want
                                              to display your custom attribute */
            'type' => 'text',/* Data type in which format your value save in database*/
            'backend' => Backend::class,
            'frontend' => '',
            'label' => 'Vendor Name', /* label of your attribute*/
            'input' => 'text',
            'class' => '',
            'source' => '',
            'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
            /*Scope of your attribute */
            'visible' => false,
            'required' => false,
            'user_defined' => false,
            'default' => '',
            'searchable' => false,
            'filterable' => false,
            'comparable' => false,
            'visible_on_front' => false,
            'is_used_in_grid' => false,
            'is_visible_in_grid' => false,
            'is_filterable_in_grid' => false,
            'is_html_allowed_on_front' => true,
            'used_in_product_listing' => true,
            'unique' => false,
            'system' => false,
        ]
    );

        $eavSetup->addAttribute(
            \Magento\Sales\Model\Order::ENTITY,
            'vendor_name',
            [
                'group' => '',/* Group name in which you want
                                              to display your custom attribute */
                'type' => 'text',/* Data type in which format your value save in database*/
                'backend' => Backend::class,
                'frontend' => '',
                'label' => 'Vendor Name', /* label of your attribute*/
                'input' => 'text',
                'class' => '',
                'source' => '',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                /*Scope of your attribute */
                'visible' => false,
                'required' => false,
                'user_defined' => false,
                'default' => '',
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => false,
                'is_used_in_grid' => true,
                'is_visible_in_grid' => true,
                'is_filterable_in_grid' => false,
                'is_html_allowed_on_front' => true,
                'used_in_product_listing' => true,
                'unique' => false,
                'system' => false,
            ]
        );

        $setup->endSetup();
    }
}