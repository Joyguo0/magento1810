<?php
class Magentothem_Layerednavigationajax_Block_Catalogsearch_Layer_Filter_Attribute extends Mage_Catalogsearch_Block_Layer_Filter_Attribute
{
    public function __construct()
    {
        
        parent::__construct();
        
        $enableModule = Mage::helper('layerednavigationajax/data')->getStoreConfigField('enabled');
        if($enableModule){
            $this->setTemplate('layerednavigationajax/attribute.phtml');
        }
    }
}