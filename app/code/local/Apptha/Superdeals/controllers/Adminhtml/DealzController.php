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
class Apptha_Superdeals_Adminhtml_DealzController extends Mage_Adminhtml_Controller_Action {

    protected function _initAction() {
        $this->loadLayout()->_setActiveMenu("superdeals/dealz")->_addBreadcrumb(Mage::helper("adminhtml")->__("Dealz  Manager"), Mage::helper("adminhtml")->__("Dealz Manager"));
        return $this;
    }

    /**
     * fucntion to view deals details
     *          
     * @return void
     */
    public function indexAction() {
        $this->_title($this->__("Super Deals"));
        $this->_title($this->__("Manage Deals"));
        /**
         *  fucntion to view Deals order
         */
        $this->_initAction();
        $this->renderLayout();
    }

    /**
     * fucntion to delete deals order report details
     * 
     * @return void
     */
    public function deleteAction() {
        if ($this->getRequest()->getParam("id") > 0) {
            try {
                $model = Mage::getModel("superdeals/dealz");
                $model->setId($this->getRequest()->getParam("id"))->delete();
                Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Item was successfully deleted"));
                $this->_redirect("*/*/");
            } catch (Exception $e) {
                Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
                $this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
            }
        }
        $this->_redirect("*/*/");
    }

    /**
     *  fucntion to delete deals order report details
     * 
     * @return void
     */
    public function massRemoveAction() {
        try {
            $ids = $this->getRequest()->getPost('serial_ids', array());

            foreach ($ids as $id) {
                $model = Mage::getModel("superdeals/dealz");
                $model->setId($id)->delete();
            }

            Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Item(s) was successfully removed"));
        } catch (Exception $e) {
            Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
        }
        $this->_redirect('*/*/');
    }

    /**
     *  Export order grid to CSV format
     * 
     * @return void
     */
    public function exportCsvAction() {
        $fileName = 'dealz.csv';
        $grid = $this->getLayout()->createBlock('superdeals/adminhtml_dealz_grid');
        $this->_prepareDownloadResponse($fileName, $grid->getCsvFile());
    }

    /**
     *   Export order grid to Excel XML format
     * 
     * @return void
     */
    public function exportExcelAction() {
        $fileName = 'dealz.xml';
        $grid = $this->getLayout()->createBlock('superdeals/adminhtml_dealz_grid');
        $this->_prepareDownloadResponse($fileName, $grid->getExcelFile($fileName));
    }

}
