<?
$pag['backgroundColor'] = "grey,0";
$pag = new AppBundle\Utility\Obj\pag($pag);

$preloaderFull['layerBackgroundColor'] = 'b-w-t,0';
$preloaderFull['backgroundColor'] = array('purple,5', 'blue,3');
$preloaderFull['mode'] = "0";
$preloaderFull = new AppBundle\Utility\Obj\preloaderFull($preloaderFull);

$editarPagina = $tempElement['editar_pagina'];
$tempElement = new AppBundle\Utility\Obj\tempElement($tempElement);

if(!empty($editar)){
	if(!empty($action) && $action !== 'default'){
		$editJs = new AppBundle\Utility\Obj\editJs($editar);
		$pag->js = $editJs->getJs('default');
		switch ($action) {
			case 'add':
			$pag->js = $editJs->getJs('add'); 
			break;
			case 'edit':
			$pag->js = $editJs->getJs('edit');				
			break;
			case 'del':
			$pag->js = $editJs->getJs('del');				
			break;
			case 'hiddenadd':
			$pag->js = $editJs->getJs('hiddenadd'); 
			break;
			case 'hiddenedit':
			$pag->js = $editJs->getJs('hiddenedit');				
			break;
			case 'hiddendel':
			$pag->js = $editJs->getJs('hiddendel');				
			break;
		}
	}
}
$pag->addObj($preloaderFull);
if(!empty($hiddenMod)){
	//cuando sale tempMod
	$formId = $tempElement->id;

	$js = new AppBundle\Utility\Obj\js();
	$arrayJs[] = "$('#aceptar').click(function(){ $('#{$formId}').submit(); }); $('#cancelar').click(function(){ var url = window.location.href.split('/'); window.location.href = url[0]+'//'+url[2]+'/editpag/{$editarPagina}';  });";
	$js->js = ($arrayJs);
	
	$tempElement->html .= '<div class="center-align afbtn"><button id="aceptar" href="#" class="btn btn-flat">aceptar</button>    <button id="cancelar" href="#" class="btn btn-flat">cancelar</button></div><br>';

	$conteiner = new AppBundle\Utility\Obj\container();
	$conteiner->addObj($tempElement);
	$conteiner->addObj($js);
	$pag->addObj($conteiner);
	
}
else{
	$pag->addObj($tempElement);
}
$pag->render();