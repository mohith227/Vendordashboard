<?php
/**
 * Created by PhpStorm.
 * User: Navaneeth Vijay
 * Date: 8/27/2018
 * Time: 3:16 PM
 */

namespace Codilar\Marketplace\Ui\Component\Listing\Column;


class IsApproved implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
{
    return [['value' => 1, 'label' => __('Approved')], ['value' => 0, 'label' => __('Not Approved')]];
}
}