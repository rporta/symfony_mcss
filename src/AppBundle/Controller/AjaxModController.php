<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Utility\dirbase\dirBase;
use AppBundle\Utility\Obj\tempElement;

class AjaxModController extends Controller
{
	public function indexAction(Request $request)
	{
		if(strpos($request->server->get('DOCUMENT_ROOT'), "/") === FALSE ){ 
			#path plantillas html Windows
			$relativePathListObj = "\\src\\AppBundle\\Utility\\Obj";
			$relativePath = "\\src\\AppBundle\\Resources\\views\\default";
			$path = str_replace("\\web", $relativePath, $request->server->get('DOCUMENT_ROOT'));
			$pathListObj = str_replace("\\web", $relativePathListObj, $request->server->get('DOCUMENT_ROOT'));

		}
		else{
			#path plantillas html Linux
			$relativePathListObj = "/src/AppBundle/Utility/Obj";
			$relativePath = "/src/AppBundle/Resources/views/default";
			$path = str_replace("/web", $relativePath, $request->server->get('DOCUMENT_ROOT'));
			$pathListObj = str_replace("/web", $relativePathListObj, $request->server->get('DOCUMENT_ROOT'));

		}
		//traigo obj mod	
		$data = $request->request->all();

		$serviceObj = $this->container->get('obj');
		$post['editar_pagina'] = $request->attributes->get('pag');

		$dirbase = new dirbase($path);
		$file = $dirbase->getObj($post['editar_pagina']);
		$filePag = $file->viewFile();
		unset($dirbase);

		//traigo obj pag
		$objPag = $serviceObj->scanObjFile($filePag);

		$dirbase2 = new dirbase($pathListObj);

		//traigo obj disponibles
		$objDir = $serviceObj->scanObjDir($dirbase2);
		unset($dirbase2);
	 
		$objMod = $serviceObj->jsonSetParam($data['json']);

		$nameObjMod = $serviceObj->getName($objMod, $objPag, $objDir);
		$obj = $serviceObj->getObj($nameObjMod, $objPag, 'name');
		$objFull = $serviceObj->getObjType($obj, $objDir);

		$tempElement['obj'] = $obj;
		$tempElement['mode'] = "modobj";
		$tempElement['action'] = "/ajaxprocess";
		$tempElement['objFull'] = $objFull;
		$tempElement['objPag'] = $objPag;
		$tempElement['editar_pagina'] = $post['editar_pagina'];
		$tempElement = new tempElement($tempElement);
		return $this->json(array($tempElement->html, $tempElement->js[0], $tempElement->id));
	}
	public function modAction(Request $request){
		if(strpos($request->server->get('DOCUMENT_ROOT'), "/") === FALSE ){ 
			#path plantillas html Windows
			$relativePathListObj = "\\src\\AppBundle\\Utility\\Obj";
			$relativePath = "\\src\\AppBundle\\Resources\\views\\default";
			$path = str_replace("\\web", $relativePath, $request->server->get('DOCUMENT_ROOT'));
			$pathListObj = str_replace("\\web", $relativePathListObj, $request->server->get('DOCUMENT_ROOT'));
		}
		else{
			#path plantillas html Linux
			$relativePathListObj = "/src/AppBundle/Utility/Obj";
			$relativePath = "/src/AppBundle/Resources/views/default";
			$path = str_replace("/web", $relativePath, $request->server->get('DOCUMENT_ROOT'));
			$pathListObj = str_replace("/web", $relativePathListObj, $request->server->get('DOCUMENT_ROOT'));
		}

    	$post = $request->request->all();

        $serviceObj = $this->container->get('obj');

        $dirbase = new dirbase($path);
        $file = $dirbase->getObj($post['editar_pagina']);
        $filePag = $file->viewFile();
        unset($dirbase);
        //traigo obj pag
		$objPag = $serviceObj->scanObjFile($filePag);
		
        //traigo objMod
        $objMod = $serviceObj->formSetParam($post);
        $objPag = $serviceObj->modObj($objMod, $objPag);

        //se coloco la cadena 'nomevasaencontrarnunca' para que objPag no elimine los metodos
        $codePhp = $serviceObj->createPhp($objPag);

        $file->truncateFile();
        $file->editFile($codePhp);


        //pendiente crear el codigo de la pagina
    	return $this->redirectToRoute('edit_pag', array('pag' => $post['editar_pagina']));
	}
}
