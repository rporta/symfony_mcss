<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Utility\dirbase\dirBase;
// use AppBundle\Service\Obj\ListObj;

class ListObjController extends Controller
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
        $serviceObj = $this->container->get('obj');
    	$post['editar_pagina'] = $request->attributes->get('pag');

        $dirbase = new dirbase($path);
        $filePag = $dirbase->getObj($post['editar_pagina'])->viewFile();

        
        $objPag = $serviceObj->scanObjFile($filePag);
        unset($dirbase);
        $dirbase2 = new dirbase($pathListObj);

        $objDir = $serviceObj->scanObjDir($dirbase2);
        
        xbug($objDir);
        die();
        return $this->render('AppBundle:default:listObj.html.php', array());
    }

}
