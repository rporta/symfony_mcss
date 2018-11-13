<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Utility\dirbase\dirBase;
use AppBundle\Utility\Obj\tempElement;

class AjaxAddController extends Controller
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

        $tempElement['mode'] = "listobj";
        $tempElement['action'] = "/ajaxadd2/{$post['editar_pagina']}";
        $tempElement['nameObjAdd'] = $nameObjAdd;
        $tempElement['objDir'] = $objDir;
        $tempElement['editar_pagina'] = $post['editar_pagina'];
        $tempElement = new tempElement($tempElement);

        return $this->json(array($tempElement->html, $tempElement->js[0], $tempElement->id));
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
        //traigo obj data add    
        $data = $request->request->all();

        $serviceObj = $this->container->get('obj');
        $post['editar_pagina'] = $request->attributes->get('pag');

        $dirbase = new dirbase($path);
        $file = $dirbase->getObj($post['editar_pagina']);
        $filePag = $file->viewFile();
        unset($dirbase);

        $dirbase2 = new dirbase($pathListObj);

        //traigo obj disponibles
        $objDir = $serviceObj->scanObjDir($dirbase2);
        unset($dirbase2);
        
        //traigo obj pag
        $objPag = $serviceObj->scanObjFile($filePag);

        $obj = $serviceObj->getObj($data['type'], $objDir, 'type');

        $tempElement['mode'] = "newobj";
        $tempElement['action'] = "/ajaxprocessadd";
        $tempElement['objFull'] = $obj;
        $tempElement['objPag'] = $objPag;
        $tempElement['nameObjAdd'] = $data['nameObjAdd'];
        $tempElement['editar_pagina'] = $post['editar_pagina'];
        return $this->render('AppBundle:default:newObj.html.php' ,array('tempElement' => $tempElement));
            
    }
    public function addAction(Request $request){
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
        $objAdd = $serviceObj->formSetParam($post);

        $objPag = $serviceObj->addObj($post['nameObjAdd'], $objPag, $objAdd);

        // $objPag = $serviceObj->modObj($objMod, $objPag);

        $codePhp = $serviceObj->createPhp($objPag);
        
        $file->truncateFile();
        $file->editFile($codePhp);


        //pendiente crear el codigo de la pagina
        return $this->redirectToRoute('edit_pag', array('pag' => $post['editar_pagina']));
    }
}
