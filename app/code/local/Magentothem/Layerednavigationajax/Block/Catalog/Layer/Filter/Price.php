<?php

class Magentothem_Layerednavigationajax_Block_Catalog_Layer_Filter_Price extends Mage_Catalog_Block_Layer_Filter_Price {

    public $_currentCategory;
    public $_productCollection;
    public $_currMinPrice;
    public $_currMaxPrice;
    public $_searchSession;

    public function __construct() {

        $this->_currentCategory = Mage::registry('current_category');
        $this->_searchSession = Mage::getSingleton('catalogsearch/session');
        $this->setProductCollection();
        $this->setCurrentPrices();
        parent::__construct();
        if(Mage::getStoreConfig('layerednavigationajax/layerfiler_config/enabled')){
           $this->setTemplate('magentothem/layerednavigationajax/filter.phtml');
        }
        //Mage::getConfig()->getModuleConfig('Magentothem_Layerednavigationajax')->is('active', 'true');
    }

    public function getMaxRangePrice() {

        if ((isset($_GET['q']) && !isset($_GET['last'])) || !isset($_GET['q'])) {

            $maxPrice = $this->_productCollection
                    ->getLastItem()
                    ->getPrice();
        } else {
            $maxPrice = $this->_searchSession->getMaxPrice();
        }

        return $maxPrice;
    }

    public function getMinRangePrice() {

        if ((isset($_GET['q']) && !isset($_GET['first'])) || !isset($_GET['q'])) {
            $minPrice = $this->_productCollection
                    ->getFirstItem()
                    ->getPrice();
        } else {
            $minPrice = $this->_searchSession->getMinPrice();
        }
        return $minPrice;
    }

    public function setProductCollection() {

        if ($this->_currentCategory) {
            $this->_productCollection = $this->_currentCategory
                    ->getProductCollection()
                    ->addAttributeToSelect('*')
                    ->setOrder('price', 'ASC');
        } else {
            $this->_productCollection = Mage::getSingleton('catalogsearch/layer')
                    ->getProductCollection()
                    ->addAttributeToSelect('*')
                    ->setOrder('price', 'ASC');
        }
    }

    public function setCurrentPrices() {


        $this->_currMinPrice = $this->getRequest()->getParam('first');
        $this->_currMaxPrice = $this->getRequest()->getParam('last');

        if (!$this->_currMaxPrice) {
            $this->_currMaxPrice = $this->getMaxRangePrice();
        }

        if ((isset($_GET['q']) && !isset($_GET['first'])) || !isset($_GET['q'])) {
            $this->_searchSession->setMinPrice($this->_productCollection->getFirstItem()->getPrice());
        }


        if (!$this->_currMinPrice) {
            $this->_currMinPrice = $this->getMinRangePrice();
        }

        if ((isset($_GET['q']) && !isset($_GET['last'])) || !isset($_GET['q'])) {
            $this->_searchSession->setMaxPrice($this->_productCollection->getLastItem()->getPrice());
        }
    }

}
