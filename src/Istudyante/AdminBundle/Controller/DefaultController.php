<?php

namespace Istudyante\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AdminBundle:Default:index.html.twig', array('name' => $name));
    }
    
    public function loginAction()
    {
        if ($this->getRequest()->isMethod('POST')) {
            $form->bindRequest($this->getRequest());
        
            if ($form->isValid()) {
                $user->setEmail($form->get('email')->getData());
                $user->setPassword(SecurityHelper::hash_sha256($form->get('password')->getData()));
                $user = $this->get('services.admin_user')->findByEmailAndPassword($user->getEmail(), $user->getPassword());
        
                if (!$user) {
                    // invalid credentials
                    $this->get('session')->setFlash('flash.notice', 'Email and Password is invalid.');
        
                    return $this->redirect($this->generateUrl('admin_login'));
                }
                else {
                    $this->get('session')->setFlash('flash.notice', 'Login successfully!');
                    $token = new UsernamePasswordToken($user->__toString(),$user->getPassword() , 'admin_secured_area', array('ROLE_ADMIN'));
                    $this->get("security.context")->setToken($token);
                    $this->getRequest()->getSession()->set('_security_admin_secured_area', \serialize($token));
        
                    return $this->redirect($this->generateUrl('admin_homepage'));
                }
            }
        }
        
        return $this->render('AdminBundle:AdminUser:login.html.twig');
    }
}
