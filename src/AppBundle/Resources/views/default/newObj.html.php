<?
$pag['backgroundColor'] = "grey,0";
$pag = new AppBundle\Utility\Obj\pag($pag);

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
$pag->addObj($tempElement);
$pag->render();