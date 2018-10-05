<?php
/**
 * Created by PhpStorm.
 * User: Navaneeth Vijay
 * Date: 8/26/2018
 * Time: 3:11 PM
 */

namespace Codilar\Marketplace\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\App\Filesystem\DirectoryList;


class InstallSchema implements InstallSchemaInterface
{
    /**
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();
        $table = $installer->getConnection()->newTable(
            $installer->getTable('marketplace_vendors')
        )->addColumn(
            'vendor_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'nullable' => false, 'primary' => true],
            'vendor record Id'
        )->addColumn(
            'user_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            255,
            ['nullable' => false],
            'customer_id'
        )->addColumn(
            'created_at',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            255,
            ['nullable' => false],
            'created at'
        )->addColumn(
            'user_name',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'user name'
        )->addColumn(
            'first_name',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'First name'
        )->addColumn(
            'last_name',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Last name'
        )->addColumn(
            'shop_name',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'shop name'
        )->addColumn(
            'shop_url',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'shop url'
        )->addColumn(
            'logo_url',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Logo'
        )->addColumn(
            'banner_url',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Banner'
        )->addColumn(
            'address',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'address'
        )->addColumn(
            'city',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'City'
        )->addColumn(
            'country',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Country'
        )->addColumn(
            'state',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'state'
        )->addColumn(
            'phone',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'phone'
        )->addColumn(
                'email',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                'email'
        )->addColumn(
                'password',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                'password'
        )->addColumn(
            'sales',
            \Magento\Framework\DB\Ddl\Table::TYPE_FLOAT,
            255,
            ['nullable' => false],
            'Total sales'
        )->addColumn(
            'commission',
            \Magento\Framework\DB\Ddl\Table::TYPE_FLOAT,
            255,
            ['nullable' => false],
            'commission rate'
        )->addColumn(
            'commission_amount',
            \Magento\Framework\DB\Ddl\Table::TYPE_FLOAT,
            255,
            ['nullable' => false],
            'Commission Amount'
        )->addColumn(
            'pending_amount',
            \Magento\Framework\DB\Ddl\Table::TYPE_FLOAT,
            255,
            ['nullable' => false],
            'Remaining Amount'
        )->setComment(
            'Row Data Table'
        );
        $installer->getConnection()->createTable($table);
        $installer->endSetup();
    }

}