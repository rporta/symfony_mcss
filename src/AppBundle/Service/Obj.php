<?
namespace AppBundle\Service;

use AppBundle\Utility\dirbase\dirBase;

class Obj
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
		$temp_reg_exp[] = "(\{PARAM}\[')(.+)('\])(\040+\=\040+)(.+)\;";
		$temp_reg_exp[] = "(\\$)({PARAM})(->)(.+)(\040+\=\040+)(.+)\;";
		foreach ($result as $key => &$value) {
			if(!empty($value['param'])){
				$reg_exp = str_replace("{PARAM}", $value['param'], $temp_reg_exp[0]);
				if(preg_match_all("/{$reg_exp}/", $filePag, $out)){
					foreach ($out[2] as $key1 => $value1) {
						$param[$key1]['param'] = $value1;
					}
					foreach ($out[5] as $key2 => $value2) {
						$param[$key2]['value'] = $value2;
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
						$param[$key2]['value'] = $value2;
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
			$result[$key]['param'] = $this->getParamClass($filePag);
			$result[$key]['action'] = $this->getActionClass($filePag);
		}

		return $result;
	}
	public function getParamClass($filePag){
		$temp_reg_exp = "(\\$)([a-zA-Z]+)(->)([a-zA-Z]+)(\s+\=\s+)(!isset)";

		if(preg_match_all("/{$temp_reg_exp}/", $filePag, $out)){
			return $out[4];
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
}