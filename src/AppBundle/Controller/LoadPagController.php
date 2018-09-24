<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
//use AppBundle\Utility\dirbase\dirBase;

class LoadPagController extends Controller
{
    public function indexAction(Request $request)
    {
    	$post['editar_pagina'] = $request->attributes->get('pag');
    	$post['editar_accion'] = $request->attributes->get('action');
        return $this->render('AppBundle:default:frame.html.php', array('post' => $post));
    }	
}
