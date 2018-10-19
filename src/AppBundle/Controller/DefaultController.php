<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
    	return $this->render('AppBundle:default:index.html.php');
    }
    public function tempAction(Request $request){
    	return $this->render('AppBundle:default:temp.html.php');
    }
}
