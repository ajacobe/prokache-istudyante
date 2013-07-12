<?php
namespace Istudyante\AdminBundle\Services;

use Doctrine\Bundle\DoctrineBundle\Registry;

use Symfony\Component\Security\Core\SecurityContext;

class AdminUserProvider extends AccountsUserProvider
{
    
    /**
     * @var Registry
     */
    private $doctrine;
    
    public function __construct(Registry $doctrine)
    {
        $this->doctrine = $doctrine;
    }
    
    public function getUser(array $accountData)
    {
        echo $accountData;exit;
        $user = $this->doctrine->getRepository('UserBundle:Account')->find(1);

        if ($user) {
            // populate account data to SiteUser
//             $user = $this->userService->hydrateAccountData($user, $accountData);
            
            // set user roles
            $user->setRoles('ROLE_ADMIN');

            //TODO: not sure if this is the place to set the session; this
            // shouldn't be part of the user provider's responsibilities
            //$this->userService->setSessionVariables($user);

            return $user;
        }

        return null;
    }

    /**
     *
     * @see \Symfony\Component\Security\Core\User\UserProviderInterface::supportsClass()
     */
    public function supportsClass($class)
    {
        return $class === 'Istudyante\UserBundle\Entity\Account';
    }

}