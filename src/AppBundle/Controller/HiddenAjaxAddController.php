<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Utility\dirbase\dirBase;

class HiddenAjaxAddController extends Controller
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
        $file = $dirbase->getObj($post['editar_pagina']);
        $filePag = $file->viewFile();
        unset($dirbase);
        
        //traigo obj pag
        $objPag = $serviceObj->scanObjFile($filePag);

        $dirbase2 = new dirbase($pathListObj);

        //traigo obj disponibles
        $objDir = $serviceObj->scanObjDir($dirbase2);
        unset($dirbase2);

        $objHiddenPag = $serviceObj->scanHiddenObj($objPag);
        
        $tempElement['mode'] = "hiddenobjmod";
        $tempElement['action'] = "/hiddenajaxadd2/{$post['editar_pagina']}";
        $tempElement['objPag'] = $objPag;
        $tempElement['editar_pagina'] = $post['editar_pagina'];
        return $this->render('AppBundle:default:newObj.html.php' ,array('tempElement' => $tempElement));
    }
    public function index2Action(Request $request){
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

        //traigo obj disponibles
        $objDir = $serviceObj->scanObjDir($dirbase2);

        $tempElement['mode'] = "listobj";
        $tempElement['action'] = "/ajaxadd2/{$post['editar_pagina']}";
        $tempElement['nameObjAdd'] = $data['name'];
        $tempElement['objDir'] = $objDir;
        $tempElement['editar_pagina'] = $post['editar_pagina'];

        return $this->render('AppBundle:default:newObj.html.php' ,array('tempElement' => $tempElement, "hiddenMod" => TRUE));
    }
}
