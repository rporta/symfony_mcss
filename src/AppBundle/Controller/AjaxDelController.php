<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Utility\dirbase\dirBase;

class AjaxDelController extends Controller
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
        //traigo obj del	
    	$data = $request->request->all();

        $serviceObj = $this->container->get('obj');
    	$post['editar_pagina'] = $request->attributes->get('pag');

        $dirbase = new dirbase($path);
        $file = $dirbase->getObj($post['editar_pagina']);
        $filePag = $file->viewFile();
        unset($dirbase);
        //traigo obj pag
        $objPag = $serviceObj->scanObjFile($filePag);
        // xbug($objPag);

        $dirbase2 = new dirbase($pathListObj);
        //traigo obj disponibles
        $objDir = $serviceObj->scanObjDir($dirbase2);
        unset($dirbase2);
     
        $objDel = $serviceObj->jsonSetParam($data['json']);

        $nameObjDel = $serviceObj->getName($objDel, $objPag, $objDir);
        $objPag = $serviceObj->delObj($nameObjDel, $objPag);

        $codePhp = $serviceObj->createPhp($objPag, $filePag, $nameObjDel);
        
        $file->truncateFile();
        $file->editFile($codePhp);

        
        return $this->json("objeto ({$nameObjDel}) eliminado con exito");
    }		
}
