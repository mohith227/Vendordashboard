<?php
/**
 * Created by PhpStorm.
 * User: mohith
 * Date: 28/8/18
 * Time: 8:08 AM
 */
namespace Codilar\Marketplace\Model;

use Codilar\Marketplace\Api\Data\VendorInterface;

class Vendor extends \Magento\Framework\Model\AbstractModel implements VendorInterface
{
    /**
     * CMS page cache tag.
     */
    const CACHE_TAG = 'marketplace_vendors';

    /**
     * @var string
     */
    protected $_cacheTag = 'marketplace_vendors';

    /**
     * Prefix of model events names.
     *
     * @var string
     */
    protected $_eventPrefix = 'marketplace_vendors';

    protected function _construct()
    {
        $this->_init('Codilar\Marketplace\Model\ResourceModel\Vendor');
    }

    /**
     * @return integer
     */
    public function getVendorId()
    {
        return $this->getData(self::VENDOR_ID);
    }

    /**
     * @param int $vendorId
     * @return Vendor|\Magento\Framework\Model\AbstractModel
     */
    public function setVendorId($vendorId)
    {
        return $this->setData(self::VENDOR_ID, $vendorId);
    }


    /**
     * @return integer
     */
    public function getUserId(){
        return $this->getData(self::USER_ID);
    }

    /**
     * @param $userId
     * @return Vendor
     */
    public function setUserId($userId){
        return $this->setData(self::USER_ID, $userId);
    }


    /**
     * @return mixed
     */
    public function getCreatedAt(){
        return $this->getData(self::CREATED_AT);
    }

    /**
     * @param $createdAt
     * @return Vendor
     */
    public function setCreatedAt($createdAt){
        return $this->setData(self::CREATED_AT, $createdAt);
    }


    /**
     * @return string
     */

    public function getUserName(){
        return $this->getData(self::USER_NAME);
    }

    /**
     * @param $userName
     * @return Vendor|mixed
     */
    public function setUserName($userName){
        return $this->setData(self::USER_NAME, $userName);
    }

    /**
     * @return string
     */
    
    public function getFirstName(){
        return $this->getData(self::FIRST_NAME);
    }

    /**
     * @param $firstName
     * @return Vendor
     */
    public function setFirstName($firstName){
        return $this->setData(self::FIRST_NAME, $firstName);
    }


    /**
     * @return string
     */
    public function getLastName(){
        return $this->getData(self::LAST_NAME);
    }

    /**
     * @param $lastName
     * @return Vendor
     */
    public function setLastName($lastName){
        return $this->setData(self::LAST_NAME, $lastName);
    }

    /**
     * @return string
     */
    public function getShopName()
    {
        return $this->getData(self::SHOP_NAME);
    }

    /**
     * @param $shopName
     * @return Vendor
     */
    public function setShopName($shopName)
    {
        return $this->setData(self::SHOP_NAME,$shopName);
    }

    /**
     * @return string
     */
    public function getShopUrl(){
        return $this->getData(self::SHOP_URL);
    }

    /**
     * @param $shopUrl
     * @return Vendor
     */
    public function setShopUrl($shopUrl){
        return $this->setData(self::SHOP_URL, $shopUrl);
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->getData(self::EMAIL);
    }

    /**
     * @param $email
     * @return mixed
     */
    public function setEmail($email)
    {
        return $this->getData(self::EMAIL,$email);
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->getData(self::PASSWORD);
    }

    /**
     * @param $password
     * @return $this
     */
    public function setPassword($password)
    {
        return $this->setData(self::PASSWORD,$password);
    }


}