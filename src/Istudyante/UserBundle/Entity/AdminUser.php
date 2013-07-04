<?php

namespace Istudyante\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdminUser
 */
class AdminUser
{
    /**
     * @var integer
     */
    private $accountId;

    /**
     * @var boolean
     */
    private $status;

    /**
     * @var \Istudyante\UserBundle\Entity\AdminUserType
     */
    private $adminUserType;


    /**
     * Set accountId
     *
     * @param integer $accountId
     * @return AdminUser
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    
        return $this;
    }

    /**
     * Get accountId
     *
     * @return integer 
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * Set status
     *
     * @param boolean $status
     * @return AdminUser
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return boolean 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set adminUserType
     *
     * @param \Istudyante\UserBundle\Entity\AdminUserType $adminUserType
     * @return AdminUser
     */
    public function setAdminUserType(\Istudyante\UserBundle\Entity\AdminUserType $adminUserType = null)
    {
        $this->adminUserType = $adminUserType;
    
        return $this;
    }

    /**
     * Get adminUserType
     *
     * @return \Istudyante\UserBundle\Entity\AdminUserType 
     */
    public function getAdminUserType()
    {
        return $this->adminUserType;
    }
}
