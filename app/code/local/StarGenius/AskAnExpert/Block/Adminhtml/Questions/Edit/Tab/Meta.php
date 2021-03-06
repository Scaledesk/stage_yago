<?php
/**
 * StarGenius_AskAnExpert extension
 * 
 * NOTICE OF LICENSE
 * 
 * This source file is subject to the MIT License
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/mit-license.php
 * 
 * @category       StarGenius
 * @package        StarGenius_AskAnExpert
 * @copyright      Copyright (c) 2016
 * @license        http://opensource.org/licenses/mit-license.php MIT License
 */
/**
 * meta information tab
 *
 * @category    StarGenius
 * @package     StarGenius_AskAnExpert
 * @author      Ultimate Module Creator
 */
class StarGenius_AskAnExpert_Block_Adminhtml_Questions_Edit_Tab_Meta extends Mage_Adminhtml_Block_Widget_Form
{
    /**
     * prepare the form
     *
     * @access protected
     * @return StarGenius_AskAnExpert_Block_Adminhtml_Questions_Edit_Tab_Meta
     * @author Ultimate Module Creator
     */
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form();
        $form->setFieldNameSuffix('questions');
        $this->setForm($form);
        $fieldset = $form->addFieldset(
            'questions_meta_form',
            array('legend' => Mage::helper('stargenius_askanexpert')->__('Meta information'))
        );
        $fieldset->addField(
            'meta_title',
            'text',
            array(
                'label' => Mage::helper('stargenius_askanexpert')->__('Meta-title'),
                'name'  => 'meta_title',
            )
        );
        $fieldset->addField(
            'meta_description',
            'textarea',
            array(
                'name'      => 'meta_description',
                'label'     => Mage::helper('stargenius_askanexpert')->__('Meta-description'),
              )
        );
        $fieldset->addField(
            'meta_keywords',
            'textarea',
            array(
                'name'      => 'meta_keywords',
                'label'     => Mage::helper('stargenius_askanexpert')->__('Meta-keywords'),
            )
        );
        $form->addValues(Mage::registry('current_questions')->getData());
        return parent::_prepareForm();
    }
}
