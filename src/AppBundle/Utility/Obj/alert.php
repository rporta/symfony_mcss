<?php

namespace AppBundle\Utility\Obj;

use AppBundle\Utility\createClass;
/**
 * 
 */
class alert extends createClass
{
	public $id;
	public $type;
	public $textColor;
	public $backgroundColor;
	public $float;
	public $js;
	public $html;
	public $class;
	public $valign;
	public $shadow;	
	public $footerFixed;
	public $button;

	public function __construct($arg = NULL){
		$this->id = 'alert-'.$this->createID(5);
		$this->type = 'alert';
		$this->textColor = !isset($arg['textColor']) ? NULL : $arg['textColor'];
		$this->backgroundColor = !isset($arg['backgroundColor']) ? NULL : $arg['backgroundColor'];
		$this->float = !isset($arg['float']) ? NULL : $arg['float'];
		$this->center = !isset($arg['center']) ? NULL : $arg['center'];
		$this->valign = !isset($arg['valign']) ? NULL : $arg['valign'];
		$this->js = !isset($arg['js']) ? array() : array($arg['js']);
		$this->class = !isset($arg['class']) ? NULL : $arg['class'];
		$this->shadow = !isset($arg['shadow']) ? NULL : $arg['shadow'];
		$this->button = !isset($arg['button']) ? TRUE : $arg['button'];	
		$this->footerFixed = !isset($arg['footerFixed']) ? NULL : $arg['footerFixed'];	
		$this->bottonSheet = !isset($arg['bottonSheet']) ? NULL : $arg['bottonSheet'];	
		$this->refreshInfo();			
	}
	public function refreshInfo(){

		$id = $this->id;
		$textColor =  $this->textColors($this->textColor);
		$backgroundColor =  $this->backgroundColors($this->backgroundColor);
		$float =  $this->float($this->float);
		$center =  $this->tableCenter($this->center);	
		$valign =  $this->valign($this->valign);
		$class = $this->class;
		$objContent = $this->getObj('html:content');
		$objFooter = $this->getObj('html:footer');
		$footerFixed =  $this->modalFooterFixed($this->footerFixed);
		$bottonSheet =  $this->modalBottonSheet($this->bottonSheet);
		
		$shadow =  $this->shadow($this->shadow);	

		$this->getObj('js');

		$search = array("{ID}","{obj:html:content}","{obj:html:footer}","{TEXTCOLOR}","{BACKGROUNDCOLOR}","{VALIGN}","{FLOAT}","{SHADOW}", "{FOOTERFIXED}","{BOTTONSHEET}");
		$replace = array("{$id}", "{$objContent}", "{$objFooter}", "{$textColor}", "{$backgroundColor}", "{$valign}", "{$float}", "{$shadow}", "{$footerFixed}", "{$bottonSheet}");
				
		$tempHtml = 
		'<div id="{ID}" class="modal {TEXTCOLOR} {BACKGROUNDCOLOR} {VALIGN} {TEXTALING} {FLOAT} {HOVERABLE} {FOOTERFIXED} {BOTTONSHEET}">
			<div class="modal-content ">
				{obj:html:content}
			</div>
			<div class="modal-footer {TEXTCOLOR} {BACKGROUNDCOLOR} {VALIGN} {TEXTALING} {FLOAT} {HOVERABLE}">
				{obj:html:footer}
			</div>
		</div>';

		$tempHtml = str_replace($search, $replace, $tempHtml);

		$this->html = $tempHtml;
	}
	public function addObj($obj){
		$this->obj[] = $obj;
		$this->refreshInfo();
	}

	public function delObj($obj){
		$reversed = array_reverse($this->obj , 1);
		foreach ($reversed as $key => $objR) {
			if($objR->type == $obj->type && $objR->id == $obj->id){
				unset($this->obj[$key]);
				break;
			}
		}
		$this->refreshInfo();
	}
	public function getObj($arg){
		$arg = strtolower((string)$arg);
		if($arg == 'html:content'){
			if(!empty($this->obj)){
				foreach ($this->obj as $key => $idObj) {
					$idObj->refreshInfo();
					if($key == 0)	$objHtml[] = $idObj->html;
				}
				if(isset($objHtml)) return implode("", $objHtml);
			}
		}
		elseif($arg == 'html:footer'){
			if(!empty($this->obj)){
				foreach ($this->obj as $key => $idObj) {
					$idObj->refreshInfo();
					if($key == 1)	$objHtml[] = $idObj->html;
				}
				if(isset($objHtml)) return implode("", $objHtml);
			}
		}
		elseif($arg == 'js'){
			if(!empty($this->obj)){
				foreach ($this->obj as $Obj) {
					foreach ($Obj->js as $js) {
						if(!in_array($js, $this->js)){
							$this->js[] = $js;
						}
					}
				}
			}
			//js
			$id = $this->id;
			$js = "$('#{$id}').modal(); $('#{$id}').modal('open');";
			if(!in_array($js, $this->js)){
				$this->js[] = $js;
			}			
		}		
	}
	public function refreshId(){
		$type = $this->type;
		$id = $this->createID(5);
		$this->id = "{$type}-{$id}";
	}

}
