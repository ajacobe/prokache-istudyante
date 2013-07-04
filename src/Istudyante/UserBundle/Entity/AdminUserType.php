<?php

namespace Istudyante\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdminUserType
 */
class AdminUserType
{
    /**
     * User types that are built-in to the system and therefore not editable
     */
    const STATUS_BUILT_IN = 1;
    
    /**
     * User types that are active
     */
    const STATUS_ACTIVE = 2;
    
    /**
     * User types that are inactive
     */
    const STATUS_INACTIVE = 4;
    
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     */
    private $status;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $adminUsers;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $adminUserRoles;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->adminUsers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->adminUserRoles = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return AdminUserType
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return AdminUserType
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Add adminUsers
     *
     * @param \Istudyante\UserBundle\Entity\AdminUser $adminUsers
     * @return AdminUserType
     */
    public function addAdminUser(\Istudyante\UserBundle\Entity\AdminUser $adminUsers)
    {
        $this->adminUsers[] = $adminUsers;
    
        return $this;
    }

    /**
     * Remove adminUsers
     *
     * @param \Istudyante\UserBundle\Entity\AdminUser $adminUsers
     */
    public function removeAdminUser(\Istudyante\UserBundle\Entity\AdminUser $adminUsers)
    {
        $this->adminUsers->removeElement($adminUsers);
    }

    /**
     * Get adminUsers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAdminUsers()
    {
        return $this->adminUsers;
    }

    /**
     * Add adminUserRoles
     *
     * @param \Istudyante\UserBundle\Entity\AdminUserRole $adminUserRoles
     * @return AdminUserType
     */
    public function addAdminUserRole(\Istudyante\UserBundle\Entity\AdminUserRole $adminUserRoles)
    {
        $this->adminUserRoles[] = $adminUserRoles;
    
        return $this;
    }

    /**
     * Remove adminUserRoles
     *
     * @param \Istudyante\UserBundle\Entity\AdminUserRole $adminUserRoles
     */
    public function removeAdminUserRole(\Istudyante\UserBundle\Entity\AdminUserRole $adminUserRoles)
    {
        $this->adminUserRoles->removeElement($adminUserRoles);
    }

    /**
     * Get adminUserRoles
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAdminUserRoles()
    {
        return $this->adminUserRoles;
    }
}
