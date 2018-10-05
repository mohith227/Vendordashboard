<?php
/**
 * Created by PhpStorm.
 * User: Navaneeth Vijay
 * Date: 9/2/2018
 * Time: 9:48 PM
 */

namespace Codilar\Marketplace\Setup;
use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
    /**
     * Upgrades DB schema for a module
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $quote = 'quote';
        $orderTable = 'sales_order';

        $setup->getConnection()
            ->addColumn(
                $setup->getTable($quote),
                'vendor_name',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'length' => 255,
                    'comment' =>'Vendor Name'
                ]
            );
        //Order table
        $setup->getConnection()
            ->addColumn(
                $setup->getTable($orderTable),
                'vendor_name',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'length' => 255,
                    'comment' =>'Vendor Name'
                ]
            );

        $setup->endSetup();
    }
}