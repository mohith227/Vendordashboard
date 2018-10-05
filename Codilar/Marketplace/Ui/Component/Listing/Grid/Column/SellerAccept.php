<?php
/**
 * Created by PhpStorm.
 * User: Navaneeth Vijay
 * Date: 8/29/2018
 * Time: 10:45 AM
 */

namespace Codilar\Marketplace\Ui\Component\Listing\Grid\Column;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\UrlInterface;

class SellerAccept extends Column
{
    /** Url path */
    const ROW_ACCEPT_URL = 'marketplace/seller/approve';
    const ROW_REJECT_URL = 'marketplace/seller/reject';
    /** @var UrlInterface */
    protected $_urlBuilder;

    /**
     * @var string
     */
    private  $_acceptUrl;
    private  $_rejectUrl;

    protected $_userFactory;


    /**
     * SellerAccept constructor.
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param UrlInterface $urlBuilder
     * @param \Magento\User\Model\UserFactory $userFactory
     * @param array $components
     * @param array $data
     * @param string $acceptUrl
     * @param $rejectUrl
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        \Magento\User\Model\UserFactory $userFactory,
        array $components = [],
        array $data = [],
        $acceptUrl = self::ROW_ACCEPT_URL,
        $rejectUrl = self::ROW_REJECT_URL
    )
    {
        $this->_urlBuilder = $urlBuilder;
        $this->_userFactory = $userFactory;
        $this->_acceptUrl = $acceptUrl;
        $this->_rejectUrl = $rejectUrl;

        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source.
     *
     * @param array $dataSource
     *
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        $userModel = $this->_userFactory->create();

        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                $name = $this->getData('name');
                $userFlag = $userModel->loadByUsername($item['user_name'])->getIsActive();
                if( $userFlag == 0 ){
                    if (isset($item['vendor_id'])) {
                        $item[$name]['edit'] = [
                            'href' => $this->_urlBuilder->getUrl(
                                $this->_acceptUrl,
                                ['id' => $item['vendor_id']]
                            ),
                            'label' => __('Approve'),
                        ];
                    }
                }
                else{
                    $item[$name]['edit'] = [
                        'href' => $this->_urlBuilder->getUrl(
                            $this->_rejectUrl,
                            ['id' => $item['vendor_id']]
                        ),
                        'label' => __('Disapprove'),
                    ];

                }
            }
        }

        return $dataSource;
    }
}