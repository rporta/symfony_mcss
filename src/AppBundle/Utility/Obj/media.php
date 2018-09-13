<?php 

namespace AppBundle\Utility\Obj;

use AppBundle\Utility\Obj\CreateClass\createClass;

class media extends createClass
{
	protected $id;
	protected $type;
	protected $src;
	protected $caption;
	protected $alt;
	protected $circle;
	protected $responsive;
	protected $embeds;
	protected $mode;
	protected $js;
	
	public function __construct($arg = null){
		$this->reset($arg);
	}
	public function reset($arg = null)
	{
		$this->id = 'media-'.$this->createID(5);
		$this->type = 'media';
		$this->src = !isset($arg['src']) ? NULL : $arg['src'];
		$this->alt = !isset($arg['alt']) ? NULL : $arg['alt'];
		$this->caption = !isset($arg['caption']) ? NULL : $arg['caption'];
		$this->circle = !isset($arg['circle']) ? NULL : $arg['circle'];
		$this->responsive = !isset($arg['responsive']) ? NULL : $arg['responsive'];
		$this->embeds = !isset($arg['embeds']) ? NULL : $arg['embeds'];
		$this->mode = !isset($arg['mode']) ? '0' : $arg['mode'];
		$this->center = !isset($arg['center']) ? NULL : $arg['center'];
		$this->js = !isset($arg['js']) ? array() : array($arg['js']);		
		$this->refreshInfo();
	}
	public function refreshInfo(){
		$id = $this->id;
		$mode = $this->modeMedia($this->mode);
		if ($mode == 'img'){
			$circle = $this->circle($this->circle);
			$responsive = $this->responsiveImg($this->responsive);
			$src = $this->srcMedia($this->src);
			$alt = $this->altMedia($this->alt);

			$search = array("{CIRCLE}", "{RESPONSIVE}", "{SRC}", "{ALT}");
			$replace = array("{$circle}", "{$responsive}", "{$src}", "{$alt}");
			$tempHtml = "<img class='{CIRCLE} {RESPONSIVE}' {SRC} {ALT}>";
			$tempHtml = str_replace($search, $replace, $tempHtml);
			
			$this->html = $tempHtml;
		}
		elseif ($mode == 'MaterialBox'){
			$caption = $this->dataCaption($this->caption);
			$circle = $this->circle($this->circle);
			$responsive = $this->responsiveImg($this->responsive);
			$src = $this->srcMedia($this->src);
			$alt = $this->altMedia($this->alt);

			$center = is_null($this->center) ? NULL : "style='margin: 0% auto;'";

			$search = array("{CIRCLE}", "{RESPONSIVE}", "{SRC}", "{ALT}", "{CAPTION}", "{CENTER}");
			$replace = array("{$circle}", "{$responsive}", "{$src}", "{$alt}", "{$caption}", "{$center}");
			$tempHtml = "<img class='materialboxed {CIRCLE} {RESPONSIVE}' {CAPTION} {SRC} {ALT} {CENTER}>";
			$tempHtml = str_replace($search, $replace, $tempHtml);
			
			$this->html = $tempHtml;
			$this->js[] = " $('#{$id}').materialbox(); ";
		}		
		elseif ($mode == 'video'){
			$src = $this->srcMedia($this->src);
			if ($this->_embeds == FALSE){

				$search = '{SRC}';
				$replace = $src;
				$tempHtml = 
				"<video class='responsive-video' controls>
					<source {SRC} type='video/mp4'>
				</video>";
				$tempHtml = str_replace($search, $replace, $tempHtml);

				$this->_html = $tempHtml;
			}
			else{

				$search = '{SRC}';
				$replace = $src;
				$tempHtml = 
				"<div class='video-container'>
					<iframe {SRC} frameborder='0' allowfullscreen></iframe>
				</div>";
				$tempHtml = str_replace($search, $replace, $tempHtml);

				$this->_html = $tempHtml;
			}
		}
	}
	public function refreshId(){
		$type = $this->type;
		$id = $this->createID(5);
		$this->id = "{$type}-{$id}";
	}
    public function __set($property, $value )
    {
        $this->$property = $value;
        $this->refreshInfo();
    }
    public function __get($property)
    {
        return $this->$property;
    }

}