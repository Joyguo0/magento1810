<?php
/*
 * @author danhtungit2@gmail.com
 * @pagke  Magentothem_Layerednavigationajax
 * @version 1.1.0
 */
?>
<?php
class Magentothem_Layerednavigationajax_Model_Catalog_Layer extends Mage_Catalog_Model_Layer
{
   
    public function getProductCollection()
    {
        if (isset($this->_productCollections[$this->getCurrentCategory()->getId()])) {
            $collection = $this->_productCollections[$this->getCurrentCategory()->getId()];
        } else {
            $collection = $this->getCurrentCategory()->getProductCollection();
            $this->prepareProductCollection($collection);
            $this->_productCollections[$this->getCurrentCategory()->getId()] = $collection;
        }
        $fisrt = $_GET['first'];
        $last = $_GET['last'];
        if($fisrt && $last){
            $collection
            ->addFieldToFilter('price', array('gteq'=>$fisrt))
            ->addFieldToFilter('price', array('lteq'=>$last));
        }
		
        return $collection;
    }

    
}
