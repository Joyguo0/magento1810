<?php
/**
 * Luxe
 * MostViewed module
 *
 * @category   Luxe 
 * @package    Luxe_MostViewed
 */


/**
 * Product list
 *
 * @category   Luxe
 * @package    Luxe_MostViewed
 * @author     Yuriy V. Vasiyarov
 */
class Luxe_MostViewed_Block_Newlist extends Mage_Catalog_Block_Product_List 
{
    protected $_defaultToolbarBlock = 'mostviewed/list_toolbar';
    public function getTimeLimit() 
    {
        return intval(Mage::getStoreConfig('mostviewed/mostviewed/time_limit_in_days'));
    }

    /**
     * Retrieve loaded category collection
     *
     * @return Mage_Eav_Model_Entity_Collection_Abstract
     */
    protected function _getProductCollection()
    {
        $storeId = Mage::app()->getStore()->getStoreId();
        $this->setStoreId($storeId);
        if (is_null($this->_productCollection)) {
            $this->_productCollection = Mage::getResourceModel('reports/product_collection');

        
            $statuses = Mage::getSingleton('catalog/product_status')->getVisibleStatusIds();
            $this->_productCollection = $this->_productCollection->addAttributeToSelect('*')
                            ->setStoreId($storeId)
                            ->addStoreFilter($storeId)
                            ->addAttributeToFilter('status', $statuses)
                            ->setPageSize($this->getToolbarBlock()->getLimit())
            ->addOrder('create_at','desc');
        }
        $this->_productCollection->load();
        return $this->_productCollection;
    }

    public function _toHtml()
    {
        if ($this->_productCollection->count()) {
            return parent::_toHtml();
        } else {
            return 'no product';
        }
    } 

    /**
     * Translate block sentence
     *
     * @return string
     */
    public function __()
    {
        $args = func_get_args();
        $expr = new Mage_Core_Model_Translate_Expr(array_shift($args), 'Mage_Catalog');
        array_unshift($args, $expr);
        return Mage::app()->getTranslator()->translate($args);
    }

}
