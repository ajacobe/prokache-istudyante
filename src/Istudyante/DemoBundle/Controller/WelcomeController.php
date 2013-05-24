<?php

namespace Istudyante\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
class WelcomeController extends Controller
{
    public function indexAction(Request $request)
    {
	
		echo $request->get('name');exit;
        /*
         * The action's view can be rendered using render() method
         * or @Template annotation as demonstrated in DemoController.
         *
         */
        return $this->render('DemoBundle:Welcome:index.html.twig');
    }
}
