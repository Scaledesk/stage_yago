<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category   Mage
 * @package    Mage_Ccavenuepay
 * @copyright  Copyright (c) 2008 Irubin Consulting Inc. DBA Varien (http://www.varien.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */


class Mage_Ccavenuepay_Block_Info_Ccavenuepay extends Mage_Payment_Block_Info
{
    /**
     * Init default template for block
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setTemplate('ccavenuepay/info/ccavenuepay.phtml');
    }

    /**
     * Retrieve credit card type name
     *
     * @return string
     */
    public function getCcavenuepayTypeName()
    {
        $types = Mage::getSingleton('ccavenuepay/config')->getCcavenuepayTypes();
        if (isset($types[$this->getInfo()->getCcavenuepayType()])) {
            return $types[$this->getInfo()->getCcavenuepayType()];
        }
        return $this->getInfo()->getCcavenuepayType();
    }

   
}
 ?>