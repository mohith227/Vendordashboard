<?php
/**
 * Created by PhpStorm.
 * User: Navaneeth Vijay
 * Date: 9/3/2018
 * Time: 5:43 PM
 */

namespace Codilar\Vendorplace\Block\Adminhtml\Contact\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class ResetButton
 */
class ResetButton implements ButtonProviderInterface
{
    /**
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Reset'),
            'class' => 'reset',
            'on_click' => 'location.reload();',
            'sort_order' => 30
        ];
    }
}