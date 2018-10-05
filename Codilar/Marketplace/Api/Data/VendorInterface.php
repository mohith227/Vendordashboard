<?php
/**
 * Codilar Technologies Pvt. Ltd.
 * @category    [CATEGORY NAME]
 * @package    [PACKAGE NAME]
 * @copyright   Copyright (c) 2016 Codilar. (http://www.codilar.com)
 * @purpose     [BRIEF ABOUT THE FILE]
 * @author       Codilar Team
 **/
namespace Codilar\Marketplace\Api\Data;


interface  VendorInterface
{
    const VENDOR_ID = 'vendor_id';
    const USER_NAME = 'user_name';
    const USER_ID = 'user_id';
    const CREATED_AT = 'created_at';
    const SHOP_NAME = 'shop_name';
    const SHOP_URL = 'shop_url';
    const EMAIL = 'email';
    const PASSWORD = 'password';
    const FIRST_NAME = 'first_name';
    const LAST_NAME = 'last_name';


    /**
     * @return integer
     */
    public function getVendorId();

    /**
     * @param $vendorId
     * @return mixed
     */
    public function setVendorId($vendorId);

    /**
     * @return integer
     */
    public function getUserId();

    /**
     * @param $userId
     * @return mixed
     */
    public function setUserId($userId);

    /**
     * @return mixed
     */
    public function getCreatedAt();

    /**
     * @param $createdAt
     * @return mixed
     */
    public function setCreatedAt($createdAt);

    /**
     * @return string
     */
    public function getUserName();

    /**
     * @param $userName
     * @return mixed
     */
    public function setUserName($userName);
    /*
     * @return string
     */
    public function getShopName();

    /**
     * @param $shopName
     * @return mixed
     */
    public function setShopName($shopName);

    /**
     * @return string
     */
    public function getShopUrl();

    /**
     * @param $shopUrl
     * @return mixed
     */
    public function setShopUrl($shopUrl);

    /**
     * @return string
     */
    public function getEmail();

    /**
     * @param $email
     * @return mixed
     */
    public function setEmail($email);

    /**
     * @return string
     */
    public function getPassword();

    /**
     * @param $password
     * @return mixed
     */
    public function setPassword($password);

    /**
     * @return string
     */
    public function getFirstName();

    /**
     * @param $firstName
     * @return mixed
     */
    public function setFirstName($firstName);

    /**
     * @return string
     */
    public function getLastName();

    /**
     * @param $lastName
     * @return mixed
     */
    public function setLastName($lastName);

}