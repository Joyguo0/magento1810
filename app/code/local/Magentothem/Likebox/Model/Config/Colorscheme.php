<?php
class Magentothem_Likebox_Model_Config_Colorscheme
{
    public function toOptionArray()
    {
        return array(
            array('value'=>'light', 'label'=>Mage::helper('adminhtml')->__('Light')),
            array('value'=>'dark', 'label'=>Mage::helper('adminhtml')->__('Dark'))
        );
    }
}