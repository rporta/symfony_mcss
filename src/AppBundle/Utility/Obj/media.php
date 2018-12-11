<?php 

namespace AppBundle\Utility\Obj;

use AppBundle\Utility\Obj\CreateClass\createClass;

class media extends createClass
{
	protected $id;
	protected $type;
	protected $src;
	protected $alt;
	protected $caption;
	protected $circle;
	protected $responsive;
	protected $embeds;
	protected $mode;
	protected $center;
	protected $js;
	protected $html;
	
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
		$this->html = NULL;		
		$this->refreshInfo();
	}
	public function refreshInfo(){
		$id = $this->id;
		$mode = $this->modeMedia($this->mode);
		if ($mode == 'img-fullscreen'){
			$circle = $this->circle($this->circle);
			$responsive = $this->responsiveImg($this->responsive);
			$src = $this->src;
			$alt = $this->altMedia($this->alt);

			$center = is_null($this->center) ? NULL : "style='display: block;margin: 0% auto;'";

			$search = array("{CIRCLE}", "{RESPONSIVE}", "{SRC}", "{ALT}", "{CENTER}", "{ID}");
			$replace = array("{$circle}", "{$responsive}", "{$src}", "{$alt}", "{$center}",  "{$id}");
			$tempHtml = 
			"<style>body, html {
				height: 100% !important; }
				header{display: flex!important; }</style>
				<div id='{ID}' style='position: relative;background-position: center;background-repeat: no-repeat;background-size: cover; background-image: url(\"{SRC}\");height: 100%;'></div>";
				$tempHtml = str_replace($search, $replace, $tempHtml);

				$this->html = $tempHtml;
			}
			if ($mode == 'img'){
				$circle = $this->circle($this->circle);
				$responsive = $this->responsiveImg($this->responsive);
				$src = $this->srcMedia($this->src);
				$alt = $this->altMedia($this->alt);

				$center = is_null($this->center) ? NULL : "style='display: block;margin: 0% auto;'";

				$search = array("{CIRCLE}", "{RESPONSIVE}", "{SRC}", "{ALT}", "{CENTER}", "{ID}");
				$replace = array("{$circle}", "{$responsive}", "{$src}", "{$alt}", "{$center}",  "{$id}");
				$tempHtml = "<img id='{ID}' class='{CIRCLE} {RESPONSIVE}' {SRC} {ALT} {CENTER}>";
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

				$search = array("{CIRCLE}", "{RESPONSIVE}", "{SRC}", "{ALT}", "{CAPTION}", "{CENTER}", "{ID}");
				$replace = array("{$circle}", "{$responsive}", "{$src}", "{$alt}", "{$caption}", "{$center}", "{$id}");
				$tempHtml = "<img id='{ID}' class='materialboxed {CIRCLE} {RESPONSIVE}' {CAPTION} {SRC} {ALT} {CENTER}>";
				$tempHtml = str_replace($search, $replace, $tempHtml);

				$this->html = $tempHtml;
				$this->js[] = " $('#{$id}').materialbox(); ";
			}		
			elseif ($mode == 'video'){
				$src = $this->srcMedia($this->src);
				if ($this->_embeds == FALSE){

					$search = array('{SRC}', '{ID}');
					$replace =  array($src, $id);
					$tempHtml = 
					"<video id='{ID}' class='responsive-video' controls>
					<source {SRC} type='video/mp4'>
					</video>";
					$tempHtml = str_replace($search, $replace, $tempHtml);

					$this->html = $tempHtml;
				}
				else{

					$search = array('{SRC}', '{ID}');
					$replace =  array($src, $id);
					$tempHtml = 
					"<div id='{ID}' class='video-container'>
					<iframe {SRC} frameborder='0' allowfullscreen></iframe>
					</div>";
					$tempHtml = str_replace($search, $replace, $tempHtml);

					$this->html = $tempHtml;
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