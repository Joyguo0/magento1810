<?php
class Plugin_Adminhtml_OwaController extends Mage_Adminhtml_Controller_Action {
	public function indexAction() {
		$this->loadLayout (); 
		$this->_setActiveMenu('plugin/owa');
		$this->renderLayout ();
	}
}

