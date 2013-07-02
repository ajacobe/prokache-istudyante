<?php

namespace Istudyante\UserBundle\Repository;

use Istudyante\UserBundle\Entity\AdminUserType;

use Doctrine\ORM\Query\ResultSetMapping;

use Istudyante\UserBundle\Entity\AdminUserRole;

use Doctrine\ORM\EntityRepository;

/**
 * AdminUserRoleRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 * 
 */
class AdminUserRoleRepository extends EntityRepository
{
    /**
     * Get permissions that can be assigned to a user type
     */
    public function getAssignablePermissions()
    {
        $dql = "SELECT a FROM UserBundle:AdminUserRole a WHERE a.status = :active";
        $query = $this->getEntityManager()->createQuery($dql)
            ->setParameter('active', AdminUserRole::STATUS_ACTIVE);
        return $query->getResult();
    }
    
    public function getAssignablePermissionsByUserType(AdminUserType $userType)
    {
        $currentUserRoles = $userType->getAdminUserRoles();
        
        $ids = array();
        foreach ($currentUserRoles as $each) {
            $ids[] = $each->getId();
        }
        $idsNotIn = "'".\implode("', '",$ids)."'";
        
        $dql = "SELECT a FROM UserBundle:AdminUserRole a WHERE a.status = :active AND a.id NOT IN ({$idsNotIn})";
        $query = $this->getEntityManager()->createQuery($dql)
            ->setParameter('active', AdminUserRole::STATUS_ACTIVE);
        return $query->getResult();
    }
    
    /**
     * Get permissions that are active
     * 
     * @return AdminUserRole[]
     */
    public function getActivePermissions()
    {
        // use bitwise operation for getting the active permissions
        $sql = "SELECT * FROM admin_user_roles a WHERE a.status & :active";
        $rsm = $this->_getCommonRSM();
        $query = $this->getEntityManager()->createNativeQuery($sql, $rsm)->setParameter('active', AdminUserRole::STATUS_ACTIVE);
        
        return $query->getResult();
    }
    
    private function _getCommonRSM()
    {
        $rsm = new ResultSetMapping();
        $rsm->addEntityResult('UserBundle:AdminUserRole', 'a');
        $rsm->addFieldResult('a', 'id', 'id');
        $rsm->addFieldResult('a', 'name', 'name');
        $rsm->addFieldResult('a', 'label', 'label');
        $rsm->addFieldResult('a', 'status', 'status');
        return $rsm;
    }
}