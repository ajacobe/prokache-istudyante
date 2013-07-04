<?php
namespace Istudyante\UserBundle\Services;

use Istudyante\UserBundle\Entity\AdminUserRole;

use Symfony\Component\Security\Core\SecurityContext;

use Istudyante\UserBundle\Services\ChromediaAccountsUserProvider;

class AdminUserProvider extends ChromediaAccountsUserProvider
{
    /**
     * @param array $accountData
     */
    public function getApplicationUser(array $accountData)
    {
        $user = $this->userService->doctrine->getRepository('UserBundle:AdminUser')->findActiveUserById($accountData['id']);
        
        if ($user) {
            // populate account data to SiteUser
            $user = $this->userService->hydrateAccountData($user, $accountData);
            
            // set user roles
            $user->setRoles($this->userService->getUserRolesForSecurityToken($user));

            //TODO: not sure if this is the place to set the session; this
            // shouldn't be part of the user provider's responsibilities
            $this->userService->setSessionVariables($user);

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
        return $class === 'Istudyante\UserBundle\Entity\AdminUser';
    }

}