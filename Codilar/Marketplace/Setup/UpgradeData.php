<?php
/**
 * Created by PhpStorm.
 * User: mohith
 * Date: 7/9/18
 * Time: 12:05 PM
 */
namespace Codilar\Marketplace\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * @codeCoverageIgnore
 */
class UpgradeData implements UpgradeDataInterface
{
    /**
     * @var \Magento\Cms\Model\PageFactory
     */
    protected $_pageFactory;

    /**
     * Construct
     *
     * @param \Magento\Cms\Model\PageFactory $pageFactory
     */
    public function __construct(
        \Magento\Cms\Model\PageFactory $pageFactory
    ) {
        $this->_pageFactory = $pageFactory;
    }

    /**
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if (version_compare($context->getVersion(), '1.1') < 0) {
            $page = $this->_pageFactory->create();
            $page->setTitle('benstores')
                ->setIdentifier('benstores')
                ->setIsActive(true)
                ->setPageLayout('1column')
                ->setStores(array(0))
                ->setContent('Lorem ipsum dolor sit amet, consectetur adipiscing elit.')
                ->save();
        }

        $setup->endSetup();
    }
}