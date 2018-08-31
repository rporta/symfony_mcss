<?php 

class media extends createClass
{
	public $id;
	public $type;
	public $src;
	public $alt;
	public $circle;
	public $responsive;
	public $embeds;
	public $mode;
	public $js;
	
	function __construct($array = null)
	{
		$this->id = 'media-'.$this->createID(5);
		$this->type = 'media';
		$this->src = !isset($arg['src']) ? NULL : $arg['src'];
		$this->alt = !isset($arg['alt']) ? NULL : $arg['alt'];
		$this->circle = !isset($arg['circle']) ? NULL : $arg['circle'];
		$this->responsive = !isset($arg['responsive']) ? NULL : $arg['responsive'];
		$this->embeds = !isset($arg['embeds']) ? NULL : $arg['embeds'];
		$this->mode = !isset($arg['mode']) ? '0' : $arg['mode'];
		$this->js = !isset($arg['js']) ? array() : array($arg['js']);		
		$this->refreshInfo();
	}
	public function refreshInfo(){
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

}