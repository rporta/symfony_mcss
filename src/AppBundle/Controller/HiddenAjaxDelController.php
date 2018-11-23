<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Utility\dirbase\dirBase;

class HiddenAjaxDelController extends Controller
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
        //traigo obj add    
        $data = $request->request->all();

        $serviceObj = $this->container->get('obj');
        $post['editar_pagina'] = $request->attributes->get('pag');
        $dirbase2 = new dirbase($pathListObj);

        $dirbase = new dirbase($path);
        $file = $dirbase->getObj($post['editar_pagina']);
        $filePag = $file->viewFile();
        unset($dirbase);
        //traigo obj pag
        $objPag = $serviceObj->scanObjFile($filePag);
        //traigo obj disponibles
        $objDir = $serviceObj->scanObjDir($dirbase2);
        unset($dirbase2);

        $objAdd = $serviceObj->jsonSetParam($data['json']);

        $nameObjAdd = $serviceObj->getName($objAdd, $objPag, $objDir);

        $tempElement['mode'] = "listobjhidden";
        $tempElement['action'] = "/ajaxadd2/{$post['editar_pagina']}";
        $tempElement['objDir'] = $objDir;
        $tempElement['editar_pagina'] = $post['editar_pagina'];

        return $this->render('AppBundle:default:newObj.html.php' ,array('tempElement' => $tempElement));
    }
    public function delAction(Request $request){
        die();
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

        $codePhp = $serviceObj->createPhp($objPag);
        
        $file->truncateFile();
        $file->editFile($codePhp);

        
        return $this->json("objeto ({$nameObjDel}) eliminado con exito");    	
    }
}
