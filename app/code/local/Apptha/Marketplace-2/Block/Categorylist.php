<?php

/**
 * Apptha
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.apptha.com/LICENSE.txt
 *
 * ==============================================================
 *                 MAGENTO EDITION USAGE NOTICE
 * ==============================================================
 * This package designed for Magento COMMUNITY edition
 * Apptha does not guarantee correct work of this extension
 * on any other Magento edition except Magento COMMUNITY edition.
 * Apptha does not provide extension support in case of
 * incorrect edition usage.
 * ==============================================================
 *
 * @category    Apptha
 * @package     Apptha_Marketplace
 * @version     1.2.3
 * @author      Apptha Team <developers@contus.in>
 * @copyright   Copyright (c) 2014 Apptha. (http://www.apptha.com)
 * @license     http://www.apptha.com/LICENSE.txt
 * 
 */

/**
 * This file is used for category wise display of seller products
 */
class Apptha_Marketplace_Block_Categorylist extends Mage_Core_Block_Template {

    /**
     * Collection for category products
     * 
     * @return \Apptha_Marketplace_Block_Categorylist
     */
    protected function _prepareLayout() {
        parent::_prepareLayout();
        $sellerCategoryCollection = $this->getSellercategoryproducts();
        $this->setCollection($sellerCategoryCollection);
        $pager = $this->getLayout()
                ->createBlock('page/html_pager', 'my.pager')
                ->setCollection($sellerCategoryCollection);
        $pager->setAvailableLimit(array(10 => 10, 20 => 20, 30 => 30, 50 => 50));
        $pager->setLimit(10);
        $this->setChild('pager', $pager);
        return $this;
    }

    /**
     * Function to get pagination
     * 
     * Return pagination for collection
     * @return array
     */
    public function getPagerHtml() {
        return $this->getChildHtml('pager');
    }

    /**
     * Function to get seller product using categories
     * 
     * Return category products as array
     * @return array 
     */
    function getSellercategoryproducts() {
        $id = $this->getRequest()->getParam('id');
        $catId = $this->getRequest()->getParam('cat');
        $sortProduct = $this->getRequest()->getParam('sorting');
        $catagoryModel = Mage::getModel('catalog/category')->load($catId);
        $collection = Mage::getResourceModel('catalog/product_collection');
        /*
         * category filter
         */
        $collection->addCategoryFilter($catagoryModel);
        /*
         * only enabled product
         */ 
        $collection->addAttributeToFilter('status', 1); 
        /*
         * add product attribute to be fetched
         */
        $collection->addAttributeToSelect('*'); 
        $collection->addAttributeToFilter('seller_id', $id);
        $collection->addStoreFilter();
        $collection->addAttributeToSort($sortProduct);
        return $collection;
    }

    /**
     * Function to get particular category information
     * 
     * Return category information as array
     * @return array
     */
    function getCategoryinfo() {
        $catId = $this->getRequest()->getParam('cat');
        $category = Mage::getModel('catalog/category')->load($catId);
        return $category;
    }

}

