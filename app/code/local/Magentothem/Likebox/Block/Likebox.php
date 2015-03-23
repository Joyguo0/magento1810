<?php
class Magentothem_Likebox_Block_Likebox extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getLikebox()     
     { 
        if (!$this->hasData('likebox')) {
            $this->setData('likebox', Mage::registry('likebox'));
        }
        return $this->getData('likebox');
    }
	public function getContentLikebox()
	{	
		//get params from admin config
		$url= $this->getConfig('lb_url');
		$width = $this->getConfig('lb_width');
		$height = $this->getConfig('lb_height');
		$faces = $this->getConfig('lb_faces');
		$stream = $this->getConfig('lb_stream');
		$header = $this->getConfig('lb_header');
                $border = $this->getConfig('lb_border');
		$colorscheme = $this->getConfig('lb_colorscheme');
		// get data from facebook
		$fbcontent = "";
		$fbcontent .= '<iframe src="http://www.facebook.com/plugins/likebox.php?href='.$url;
			if ( $width ) {
				$fbcontent .= '&amp;width='.$width;
			}
                        if ( $height ) {
				$fbcontent .= '&amp;height='.$height;
			}
			if ( $colorscheme ) {
				$fbcontent .= '&amp;colorscheme='.$colorscheme;
			}
			if ( $faces ) {
				$fbcontent .= '&amp;show_faces=true';
			}else{
                                $fbcontent .= '&amp;show_faces=false';
                        }
			if ( $stream ) {
				$fbcontent .= '&amp;stream=true';
			}else{
                                $fbcontent .= '&amp;stream=false';
                        }
			if ( $header ) {
				$fbcontent .= '&amp;header=true';
			}else{
                                $fbcontent .= '&amp;header=false';
                        }
                        if ( $border ) {
				$fbcontent .= '&amp;show_border=true'.'"'; 
			}else{
                                $fbcontent .= '&amp;show_border=false'.'"'; 
                        }
                               
			
			$fbcontent .= ' scrolling="no" frameborder="0" style="border:none; overflow:hidden; background: #fff;';
			if ( $width ) {
				$fbcontent .= 'width:'.$width.'px;';
			}
			if ( $height ) {
				$fbcontent .= 'height:'.$height.'px;';
			}				
		$fbcontent .= '" allowTransparency="true"></iframe>';
		return $fbcontent;
	}
	public function getConfig($att) 
	{
		$config = Mage::getStoreConfig('likebox');
		if (isset($config['likebox_config']) ) {
			$value = $config['likebox_config'][$att];
			return $value;
		} else {
			throw new Exception($att.' value not set');
		}
	}
}