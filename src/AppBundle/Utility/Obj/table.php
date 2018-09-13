<?php

namespace AppBundle\Utility\Obj;

use AppBundle\Utility\Obj\CreateClass\createClass;
/**
 * 
 */
class table extends createClass
{
	public $id;
	public $type;
	public $textColor;
	public $backgroundColor;
	public $float;
	public $dataAtive;
	public $js;
	public $html;
	public $class;
	public $waves;
	public $valign;
	public $shadow;	
	public $textAling;	
	public $mode;
	public $head;
	public $row;

	public function __construct($arg = NULL){
		$this->reset($arg);
	}
	public function reset($arg = NULL)
	{
		$this->id = 'table-'.$this->createID(5);
		$this->type = 'table';
		$this->textColor = !isset($arg['textColor']) ? NULL : $arg['textColor'];
		$this->backgroundColor = !isset($arg['backgroundColor']) ? NULL : $arg['backgroundColor'];
		$this->float = !isset($arg['float']) ? NULL : $arg['float'];
		$this->center = !isset($arg['center']) ? NULL : $arg['center'];
		$this->valign = !isset($arg['valign']) ? NULL : $arg['valign'];
		$this->js = !isset($arg['js']) ? array() : array($arg['js']);
		$this->class = !isset($arg['class']) ? NULL : $arg['class'];
		$this->mode = !isset($arg['mode']) ? NULL : $arg['mode'];
		$this->shadow = !isset($arg['shadow']) ? NULL : $arg['shadow'];
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
		$waves = $this->waves($this->waves);
		$head = $this->getObj('html:head');
		$row = $this->getObj('html:row');
		$mode = $this->modeTable($this->mode);
		$shadow =  $this->shadow($this->shadow);	

		$search = array("{ID}", "{TEXTCOLOR}", "{BACKGROUNDCOLOR}", "{MODE}", "{CLASS}", "{HEAD}", "{ROW}", "{WAVES}", "{FLOAT}", "{VALIGN}", "{CENTER}", "{SHADOW}");
		$replace = array("{$id}", "{$textColor}", "{$backgroundColor}", "{$mode}", "{$class}", "{$head}", "{$row}", "{$waves}", "{$float}", "{$valign}", "{$center}", "{$shadow}");
		$tempHtml = '<table id="{ID}" class="{MODE} {TEXTCOLOR} {BACKGROUNDCOLOR} {WAVES} {CLASS} {FLOAT} {VALIGN} {CENTER} {SHADOW}"><thead>{HEAD}</thead>
			<tbody>{ROW}</tbody>
		</table>';
		$tempHtml = str_replace($search, $replace, $tempHtml);

		$this->html = $tempHtml;
	}
	/*se agrega por campos*/
	public function addHead($arg){
		$this->head[] = $arg;
		$this->refreshInfo();
	}
	/*Se agregan registros como array cada item del array es un campo*/
	public function addRow($arg){
		$this->row[] = $arg;
		$this->refreshInfo();
	}
	public function getObj($arg){
		$arg = strtolower((string)$arg);
		if($arg == 'html:head'){
			if(!empty($this->head)){
				$objHtml[] = "<tr>";
				foreach ($this->head as $head) {
					$objHtml[] = "<th>{$head}</th>";
				}
				$objHtml[] = "</tr>";
				if(isset($objHtml)) return implode("", $objHtml);
			}
		}
		elseif($arg == 'html:row'){
			if(!empty($this->row)){
				foreach ($this->row as $arrayRow) {
					$tempRow = "<tr><td>".implode('</td><td>', $arrayRow)."</td></tr>";
					$objHtml[] = $tempRow;
				}
			}
			if(isset($objHtml)) return implode("", $objHtml);
		}
	}
	public function refreshId(){
		$type = $this->type;
		$id = $this->createID(5);
		$this->id = "{$type}-{$id}";
	}

}
