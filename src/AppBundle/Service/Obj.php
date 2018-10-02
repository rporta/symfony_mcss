<?
namespace AppBundle\Service;

use AppBundle\Utility\dirbase\dirBase;
use AppBundle\Service\ObjParam;

class Obj extends ObjParam
{
	public function scanObjFile($filePag){
		$reg_exp[] = "(\\$)(.+)(\s+\\=\s+)(new\s+AppBundle\\\Utility\\\Obj\\\)(.+)(\\()(.*)(\\)\\;)";
		$reg_exp[] = "(\\$)(.+)(\s+\\=\s+)(new\s+AppBundle\\\Utility\\\Obj\\\(.+)(\\()(.*)(\\)\\;)|clone\s+(\\$)(.+))";

		if(preg_match_all("/{$reg_exp[1]}/", $filePag, $out)){
			foreach ($out[2] as $key => $value) {
				$result[$key]['name'] = $value;
			}
			foreach ($out[5] as $key => $value) {
				if(!empty($value)){	
					$result[$key]['type'] = $value;
				}
				else{
					//busco el tipo de objeto que se clona
					preg_match_all("/(clone)(\s+)(\\$)(.+)(\\;)/", $out[4][$key], $name);
					$name = $name[4][0];
					foreach ($out[2] as $keyx => $valuex) {
						if($valuex == $name){
							$result[$key]['type'] = $out[5][$keyx];
						}
					}
				}
			}
			foreach ($out[7] as $key => $value) {
				$result[$key]['param'] = $value;
			}
			$this->getParam($result, $filePag);
			$this->getAction($result, $filePag);
			return $result;
		}else{
			return NULL;
		}		
	}
	public function getParam(&$result, $filePag){
		$temp_reg_exp[] = "(\{PARAM}\[.)(.+)(.\])(\040+\=\040+)(.+)\;";
		$temp_reg_exp[] = "(\\$)({PARAM})(->)(.+)(\040+\=\040+)(.+)\;";
		foreach ($result as $key => &$value) {
			if(!empty($value['param'])){
				$reg_exp = str_replace("{PARAM}", $value['param'], $temp_reg_exp[0]);
				if(preg_match_all("/{$reg_exp}/", $filePag, $out)){
					foreach ($out[2] as $key1 => $value1) {
						$param[$key1]['param'] = $value1;
					}
					foreach ($out[5] as $key2 => $value2) {
						$param[$key2]['value'] =  str_replace(array('"', "'"), "", $value2);
					}
					$result[$key]['param'] = $param;
					unset($param);
					
				}
			}
			else{
				$reg_exp = str_replace("{PARAM}", $value['name'], $temp_reg_exp[1]);
				if(preg_match_all("/{$reg_exp}/", $filePag, $out2)){
					foreach ($out2[4] as $key1 => $value1) {
						$param[$key1]['param'] = $value1;
					}
					foreach ($out2[6] as $key2 => $value2) {
						$param[$key2]['value'] = str_replace(array('"', "'"), "", $value2);
					}
					$result[$key]['param'] = $param;
					unset($param);
				}
			}
		}
	}
	public function getAction(&$result, $filePag){
		$temp_reg_exp = "(\\$)({PARAM})(->)([a-zA-Z]+)(\\()(\\$)(.+)(\\))";
		foreach ($result as $key => &$value) {
			if(!empty($value['name'])){
				$reg_exp = str_replace("{PARAM}", $value['name'], $temp_reg_exp);
				if(preg_match_all("/{$reg_exp}/", $filePag, $out)){

					foreach ($out[4] as $key1 => $value1) {
						$action[$key1]['action'] = $value1;
					}
					foreach ($out[7] as $key2 => $value2) {
						$action[$key2]['value'] = $value2;
					}
					$result[$key]['action'] = $action;
					unset($action);
					
				}
			}
		}		
	}
	public function scanObjDir(dirbase $objDir){
		$temp_reg_exp = "(class)(\s+)([a-zA-Z]+)";
		$arrayFiles = $objDir->getProperty('arrayFile');

		foreach ($arrayFiles as $key => $value) {
			$filePag = $objDir->getObj($value)->viewFile();
			if(preg_match_all("/{$temp_reg_exp}/", $filePag, $out)){
				$result[$key]['type'] = $out[3][0];
			}
			$result[$key]['param'] = $this->getParamClass($filePag, $result[$key]['type']);
			$result[$key]['action'] = $this->getActionClass($filePag);
		}

		return $result;
	}
	public function getParamClass($filePag, $type){
		$temp_reg_exp = "(\\$)([a-zA-Z]+)(->)([a-zA-Z]+)(\s+\=\s+)(!isset)";

		if(preg_match_all("/{$temp_reg_exp}/", $filePag, $out)){
			foreach ($out[4] as $i => $value) {

				$param[$i]['name'] = $value;
				switch ($value) {
					case 'textColor':
						$param[$i]['value'] = array_keys($this->textColor());
						break;
					case 'backgroundColor':
						$param[$i]['value'] = array_keys($this->backgroundColor());
						break;
					case 'float':
						$param[$i]['value'] = array_keys($this->float());
						break;
					case 'textAling':
						$param[$i]['value'] = array_keys($this->textAling());
						break;
					case 'waves':
						$param[$i]['value'] = array_keys($this->waves());
						break;
					case 'shadow':
						$param[$i]['value'] = array_keys($this->shadow());
						break;
					default:
						switch ($type) {
							case 'alert':
								switch ($value) {
									case 'mode':
										$param[$i]['value'] = array_keys($this->modeAlert());
										break;

								}
								break;
							
							case 'card':
								switch ($value) {
									case 'mode':
										$param[$i]['value'] = array_keys($this->modeCard());
										break;
									case 'orientation':
										$param[$i]['value'] = array_keys($this->orientationCard());
										break;
									case 'size':
										$param[$i]['value'] = array_keys($this->sizeCard());
										break;

								}
								break;
							case 'preloader':
							case 'preloaderFull':
								switch ($value) {
									case 'mode':
										$param[$i]['value'] = array_keys($this->modePreloader());
										break;
									case 'size':
										$param[$i]['value'] = array_keys($this->sizePreloader());
										break;

								}
								break;
							case 'sideNav':
								switch ($value) {
									case 'edge':
										$param[$i]['value'] = array_keys($this->edge());
										break;

								}
								break;
							case 'icon':
								switch ($value) {
									case 'size':
										$param[$i]['value'] = array_keys($this->sizeIcon());
										break;

								}
								break;
							case 'table':
								switch ($value) {
									case 'mode':
										$param[$i]['value'] = array_keys($this->modeTable());
										break;

								}
								break;
							case 'media':
								switch ($value) {
									case 'mode':
										$param[$i]['value'] = array_keys($this->modeMedia());
										break;

								}
								break;
							case 'chip':
								switch ($value) {
									case 'mode':
										$param[$i]['value'] = array_keys($this->modeChip());
										break;

								}
								break;
							case 'h':
								switch ($value) {
									case 'size':
										$param[$i]['value'] = array_keys($this->sizeTitle());
										break;

								}
								break;
							case 'inputButton':
								switch ($value) {
									case 'mode':
										$param[$i]['value'] = array_keys($this->modeInputinputButton());
										break;

								}
								break;
							case 'inputRange':
								switch ($value) {
									case 'mode':
										$param[$i]['value'] = array_keys($this->modeInputRange());
										break;

								}
								break;
							case 'InputSelect':
								switch ($value) {
									case 'mode':
										$param[$i]['value'] = array_keys($this->modeInputSelect());
										break;

								}
								break;
							case 'InputRadioButtons':
								switch ($value) {
									case 'mode':
										$param[$i]['value'] = array_keys($this->modeInputRadioButtons());
										break;

								}
								break;
							case 'InputCheckboxes':
								switch ($value) {
									case 'mode':
										$param[$i]['value'] = array_keys($this->modeInputCheckboxes());
										break;

								}
								break;
							case 'InputFields':
								switch ($value) {
									case 'mode':
										$param[$i]['value'] = array_keys($this->modeInputFields());
										break;

								}
								break;
						}
						break;
				}
			}
			return $param;
		}

	}
	public function getActionClass($filePag){
		$temp_reg_exp = "(public)(\s+)(function)(\s+)([^__].+)((\\()(.*)(\\)))";

		if(preg_match_all("/{$temp_reg_exp}/", $filePag, $out)){
			foreach ($out[5] as $key => $value) {
				$result[$key]['action'] = $value;
				if(!empty($out[8][$key]))$result[$key]['param'] = $out[8][$key];
		}
			return $result;
		}

	}
	public function jsonSetParam($json){
		foreach ($json as $key => &$value) {
			$value['type'] = explode("-", $value['id'])[0];
			$text = empty($value['text']) ? NULL : $value['text'] ;
			$value['param'] = $this->classToParam($value['className'], $value['type'], $text);
		}
		foreach ($json as $key => &$value) {
			unset($value['id']);
			unset($value['className']);
		}
		return $json;
	}
	public function classToParam($arg, $type, $text = NULL){
		$textColor = implode("|", $this->textColor());
		$backgroundColor = implode("|", $this->backgroundColor());
		$textAling = implode("|", $this->textAling());
		$float = implode("|", $this->float());
		$waves = implode("|", $this->waves());
		$shadow = implode("|", $this->shadow());

		if(preg_match_all("/({$textColor})/", $arg, $out)){
			$param[0]['name'] = 'textColor';
			$param[0]['value'] = $this->textColor($out[0][0]);
		}
		if(preg_match_all("/({$backgroundColor})/", $arg, $out)){
			$param[1]['name'] = 'backgroundColor';
			$param[1]['value'] = $this->backgroundColor($out[0][0]);
		}
		if(preg_match_all("/({$textAling})/", $arg, $out)){
			$param[2]['name'] = 'textAling';
			$param[2]['value'] = $this->textAling($out[0][0]);
		}
		if(preg_match_all("/({$float})/", $arg, $out)){
			$param[3]['name'] = 'float';
			$param[3]['value'] = $this->float($out[0][0]);
		}
		if(preg_match_all("/({$waves})/", $arg, $out)){
			$param[4]['name'] = 'waves';
			$param[4]['value'] = $this->waves($out[0][0]);
		}
		if(preg_match_all("/({$shadow})/", $arg, $out)){
			$param[5]['name'] = 'shadow';
			$param[5]['value'] = $this->shadow($out[0][0]);
		}
		if($type == 'icon'){
			$param[5]['name'] = $type;
			$param[5]['value'] = $text;			
		}
		return $param;
	}
}