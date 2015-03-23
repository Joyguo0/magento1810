<?php
/*------------------------------------------------------------------------
# Websites: http://www.plazathemes.com/
-------------------------------------------------------------------------*/ 
class Magentothem_Themeoptions_Model_Config_Color
{

    public function toOptionArray()
    {
        return array(
            array('value'=>'black', 'label'=>Mage::helper('adminhtml')->__('Black')),
            array('value'=>'white', 'label'=>Mage::helper('adminhtml')->__('White'))           
        );
    }

}
