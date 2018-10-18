<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Utility\dirbase\dirBase;

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
        $obj = $serviceObj->getObj($nameObjMod, $objPag);
        $objFull = $serviceObj->getObjType($obj, $objDir);
        xbug($obj);
        xbug($objFull);
        die();        
        return $this->json("objeto ({$nameObjMod}) modificado con exito");
    }

}
