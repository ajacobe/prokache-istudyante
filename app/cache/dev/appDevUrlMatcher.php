<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);

        if (0 === strpos($pathinfo, '/js/compiled-admin')) {
            // _assetic_b7e4182
            if ($pathinfo === '/js/compiled-admin.js') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'b7e4182',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_b7e4182',);
            }

            // _assetic_b7e4182_0
            if ($pathinfo === '/js/compiled-admin_bootstrap.min_1.js') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'b7e4182',  'pos' => 0,  '_format' => 'js',  '_route' => '_assetic_b7e4182_0',);
            }

        }

        if (0 === strpos($pathinfo, '/css/325dbb4')) {
            // _assetic_325dbb4
            if ($pathinfo === '/css/325dbb4.css') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => '325dbb4',  'pos' => NULL,  '_format' => 'css',  '_route' => '_assetic_325dbb4',);
            }

            if (0 === strpos($pathinfo, '/css/325dbb4_bootstrap')) {
                // _assetic_325dbb4_0
                if ($pathinfo === '/css/325dbb4_bootstrap.min_1.css') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '325dbb4',  'pos' => 0,  '_format' => 'css',  '_route' => '_assetic_325dbb4_0',);
                }

                // _assetic_325dbb4_1
                if ($pathinfo === '/css/325dbb4_bootstrap-responsive.min_2.css') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '325dbb4',  'pos' => 1,  '_format' => 'css',  '_route' => '_assetic_325dbb4_1',);
                }

            }

        }

        // admin_homepage
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_homepage')), array (  '_controller' => 'Istudyante\\AdminBundle\\Controller\\DefaultController::indexAction',));
        }

        // admin_login
        if ($pathinfo === '/admin/login') {
            return array (  '_controller' => 'Istudyante\\AdminBundle\\Controller\\DefaultController::loginAction',  '_route' => 'admin_login',);
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
