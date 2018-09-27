<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AjaxDelController extends Controller
{
    public function indexAction(Request $request)
    {	    	
    	$post['editar_pagina'] = $request->attributes->get('pag');

    	return $this->json(array('finalizado'));
    }		
}
