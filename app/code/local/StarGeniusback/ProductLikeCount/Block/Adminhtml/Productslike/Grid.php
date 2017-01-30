<?php
/**
 * StarGenius_ProductLikeCount extension
 * 
 * NOTICE OF LICENSE
 * 
 * This source file is subject to the MIT License
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/mit-license.php
 * 
 * @category       StarGenius
 * @package        StarGenius_ProductLikeCount
 * @copyright      Copyright (c) 2016
 * @license        http://opensource.org/licenses/mit-license.php MIT License
 */
/**
 * ProductsLike admin grid block
 *
 * @category    StarGenius
 * @package     StarGenius_ProductLikeCount
 * @author      Ultimate Module Creator
 */
class StarGenius_ProductLikeCount_Block_Adminhtml_Productslike_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    /**
     * constructor
     *
     * @access public
     * @author Ultimate Module Creator
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('productslikeGrid');
        $this->setDefaultSort('entity_id');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }

    /**
     * prepare collection
     *
     * @access protected
     * @return StarGenius_ProductLikeCount_Block_Adminhtml_Productslike_Grid
     * @author Ultimate Module Creator
     */
    protected function _prepareCollection()
    {
        $collection = Mage::getModel('stargenius_productlikecount/productslike')
            ->getCollection();
        
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    /**
     * prepare grid collection
     *
     * @access protected
     * @return StarGenius_ProductLikeCount_Block_Adminhtml_Productslike_Grid
     * @author Ultimate Module Creator
     */
    protected function _prepareColumns()
    {
        $this->addColumn(
            'entity_id',
            array(
                'header' => Mage::helper('stargenius_productlikecount')->__('Id'),
                'index'  => 'entity_id',
                'type'   => 'number'
            )
        );
        $this->addColumn(
            'product_sku',
            array(
                'header'    => Mage::helper('stargenius_productlikecount')->__('Product SKU'),
                'align'     => 'left',
                'index'     => 'product_sku',
            )
        );
        
        $this->addColumn(
            'status',
            array(
                'header'  => Mage::helper('stargenius_productlikecount')->__('Status'),
                'index'   => 'status',
                'type'    => 'options',
                'options' => array(
                    '1' => Mage::helper('stargenius_productlikecount')->__('Enabled'),
                    '0' => Mage::helper('stargenius_productlikecount')->__('Disabled'),
                )
            )
        );
        $this->addColumn(
            'product_liked',
            array(
                'header' => Mage::helper('stargenius_productlikecount')->__('Product Liked'),
                'index'  => 'product_liked',
                'type'=> 'number',

            )
        );
        $this->addColumn(
            'u_ipaddress',
            array(
                'header' => Mage::helper('stargenius_productlikecount')->__('IP Address'),
                'index'  => 'u_ipaddress',
                'type'=> 'text',

            )
        );
        $this->addColumn(
            'url_key',
            array(
                'header' => Mage::helper('stargenius_productlikecount')->__('URL key'),
                'index'  => 'url_key',
            )
        );
        if (!Mage::app()->isSingleStoreMode() && !$this->_isExport) {
            $this->addColumn(
                'store_id',
                array(
                    'header'     => Mage::helper('stargenius_productlikecount')->__('Store Views'),
                    'index'      => 'store_id',
                    'type'       => 'store',
                    'store_all'  => true,
                    'store_view' => true,
                    'sortable'   => false,
                    'filter_condition_callback'=> array($this, '_filterStoreCondition'),
                )
            );
        }
        $this->addColumn(
            'created_at',
            array(
                'header' => Mage::helper('stargenius_productlikecount')->__('Created at'),
                'index'  => 'created_at',
                'width'  => '120px',
                'type'   => 'datetime',
            )
        );
        $this->addColumn(
            'updated_at',
            array(
                'header'    => Mage::helper('stargenius_productlikecount')->__('Updated at'),
                'index'     => 'updated_at',
                'width'     => '120px',
                'type'      => 'datetime',
            )
        );
        $this->addColumn(
            'action',
            array(
                'header'  =>  Mage::helper('stargenius_productlikecount')->__('Action'),
                'width'   => '100',
                'type'    => 'action',
                'getter'  => 'getId',
                'actions' => array(
                    array(
                        'caption' => Mage::helper('stargenius_productlikecount')->__('Edit'),
                        'url'     => array('base'=> '*/*/edit'),
                        'field'   => 'id'
                    )
                ),
                'filter'    => false,
                'is_system' => true,
                'sortable'  => false,
            )
        );
        $this->addExportType('*/*/exportCsv', Mage::helper('stargenius_productlikecount')->__('CSV'));
        $this->addExportType('*/*/exportExcel', Mage::helper('stargenius_productlikecount')->__('Excel'));
        $this->addExportType('*/*/exportXml', Mage::helper('stargenius_productlikecount')->__('XML'));
        return parent::_prepareColumns();
    }

    /**
     * prepare mass action
     *
     * @access protected
     * @return StarGenius_ProductLikeCount_Block_Adminhtml_Productslike_Grid
     * @author Ultimate Module Creator
     */
    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('entity_id');
        $this->getMassactionBlock()->setFormFieldName('productslike');
        $this->getMassactionBlock()->addItem(
            'delete',
            array(
                'label'=> Mage::helper('stargenius_productlikecount')->__('Delete'),
                'url'  => $this->getUrl('*/*/massDelete'),
                'confirm'  => Mage::helper('stargenius_productlikecount')->__('Are you sure?')
            )
        );
        $this->getMassactionBlock()->addItem(
            'status',
            array(
                'label'      => Mage::helper('stargenius_productlikecount')->__('Change status'),
                'url'        => $this->getUrl('*/*/massStatus', array('_current'=>true)),
                'additional' => array(
                    'status' => array(
                        'name'   => 'status',
                        'type'   => 'select',
                        'class'  => 'required-entry',
                        'label'  => Mage::helper('stargenius_productlikecount')->__('Status'),
                        'values' => array(
                            '1' => Mage::helper('stargenius_productlikecount')->__('Enabled'),
                            '0' => Mage::helper('stargenius_productlikecount')->__('Disabled'),
                        )
                    )
                )
            )
        );
        return $this;
    }

    /**
     * get the row url
     *
     * @access public
     * @param StarGenius_ProductLikeCount_Model_Productslike
     * @return string
     * @author Ultimate Module Creator
     */
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }

    /**
     * get the grid url
     *
     * @access public
     * @return string
     * @author Ultimate Module Creator
     */
    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', array('_current'=>true));
    }

    /**
     * after collection load
     *
     * @access protected
     * @return StarGenius_ProductLikeCount_Block_Adminhtml_Productslike_Grid
     * @author Ultimate Module Creator
     */
    protected function _afterLoadCollection()
    {
        $this->getCollection()->walk('afterLoad');
        parent::_afterLoadCollection();
    }

    /**
     * filter store column
     *
     * @access protected
     * @param StarGenius_ProductLikeCount_Model_Resource_Productslike_Collection $collection
     * @param Mage_Adminhtml_Block_Widget_Grid_Column $column
     * @return StarGenius_ProductLikeCount_Block_Adminhtml_Productslike_Grid
     * @author Ultimate Module Creator
     */
    protected function _filterStoreCondition($collection, $column)
    {
        if (!$value = $column->getFilter()->getValue()) {
            return;
        }
        $collection->addStoreFilter($value);
        return $this;
    }
}
