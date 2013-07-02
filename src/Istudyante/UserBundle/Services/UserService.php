<?php
/**
 * Service class for user related functionalities
 *
 */

namespace Istudyante\UserBundle\Services;

use Istudyante\HelperBundle\Factory\EventFactory;

use Symfony\Component\DependencyInjection\ContainerInterface;

use Symfony\Component\Security\Core\SecurityContext;

use Istudyante\UserBundle\Services\Exception\InvalidSiteUserOperationException;

use Istudyante\UserBundle\Services\Exception\FailedAccountRequestException;

use ChromediaUtilities\Helpers\Inflector;

use Istudyante\UserBundle\Entity\SiteUser;

abstract class UserService
{
    /**
     *
     * @var \Doctrine\Bundle\DoctrineBundle\Registry
     */
    public $doctrine;

    
    /**
     *
     * @var Symfony\Component\Security\Core\SecurityContext
     */
    protected $securityContext;

    /**
     *
     * @var Symfony\Component\HttpFoundation\Session\Session
     */
    protected $session;

    protected $eventDispatcher;

    /**
     * @var EventFactory
     */
    protected $eventFactory;

    protected $container;

    //abstract function login($email, $password);

    abstract function findByEmailAndPassword($email, $password);

    abstract function findById($id, $activeOnly = true);

    abstract function update(SiteUser $siteUser);

    abstract function create(SiteUser $siteUser);

    abstract function getAccountData(SiteUser $siteUser);

    abstract function setSessionVariables(SiteUser $user);
    
    /**
     * Get user roles of a SiteUser. Used for setting roles for security token.
     * 
     * @param SiteUser $user
     * @return array
     */
    abstract public function getUserRolesForSecurityToken(SiteUser $user); 

    public function __construct(ContainerInterface $container=null)
    {
        $this->container = $container;
    }

    public function setEventDispatcher($eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }

    public function setEventFactory(EventFactory $eventFactory)
    {
        $this->eventFactory = $eventFactory;
    }

    public function setSession($session)
    {
        $this->session = $session;
    }


    /**
     *
     * @param \Doctrine\Bundle\DoctrineBundle\Registry $doctrine
     */
    public function setDoctrine(\Doctrine\Bundle\DoctrineBundle\Registry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

//     public function setSecurityContext(SecurityContext $context)
//     {
//         $this->securityContext = $context;
//     }

    
    /**
     * Create new user in the global chromedia accounts
     *
     * @param \Istudyante\UserBundle\Entity\SiteUser $user
     * @throws \Istudyante\UserBundle\Services\Exception\FailedAccountRequestException
     * @return SiteUser
     */
    protected function createUser(\Istudyante\UserBundle\Entity\SiteUser $user)
    {
        $form_data = array(
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'first_name' => $user->getFirstName(),
            'last_name' => $user->getLastName(),
            'middle_name' => $user->getMiddleName()
        );

        $response = $this->request->post($this->chromediaAccountsUri,array('data' => \base64_encode(\json_encode($form_data))));

        if (200 == $response->getStatusCode()) {
            $account_data = \json_decode($response->getBody(true),true);
            $user->setAccountId($account_data['id']);
            return $user;
        }
        else {
            throw new FailedAccountRequestException($response->getBody());
        }
    }


    /**
     * Update existing user's basic information|Password
     *
     * @param \Istudyante\UserBundle\Entity\SiteUser $user
     * @throws \Istudyante\UserBundle\Services\Exception\FailedAccountRequestException
     * @return SiteUser
     */
    protected function updateUser(\Istudyante\UserBundle\Entity\SiteUser $user)
    {
        $formData = array(
            'email' => $user->getEmail(),
            'first_name' => $user->getFirstName(),
            'last_name' => $user->getLastName(),
            'middle_name' => $user->getMiddleName(),
            'password' => $user->getPassword(),
        );

        $response = $this->request->post($this->chromediaAccountsUri.'/'.$user->getAccountId(), array('data' => \base64_encode(\json_encode($formData))));
        if (200 == $response->getStatusCode()) {
            $accountData = \json_decode($response->getBody(true),true);
            $user = $this->hydrateAccountData($user, $accountData);

            return $user;
        }
        else {
            throw new FailedAccountRequestException($response->getBody());
        }
    }

   /**
     * Hydrate account data to SiteUser instance
     *
     * @param \Istudyante\UserBundle\Entity\SiteUser $user
     * @param array $accountData
     * @return SiteUser
     */
    public function hydrateAccountData(\Istudyante\UserBundle\Entity\SiteUser $user, $accountData)
    {
        foreach ($accountData as $key => $v) {
            if ($key != 'id') {
                $setMethod = 'set'.Inflector::toVariable($key);
                $user->{$setMethod}($v);
            }
        }
        return $user;
    }

    /**
     * Find user/s in chromedia global accounts based on searchBy options
     *
     * @param array $searchBy
     * @param array $options
     * @return array
     */
    public function find($searchBy, $options)
    {
        $response = $this->request->post($this->chromediaAccountsUri.'/find', array(
            'searchBy' => \base64_encode(\json_encode($searchBy)),
            'option' => \base64_encode(\json_encode($options))
        ));

        if (200 == $response->getStatusCode()) {
            $json_data = \json_decode($response->getBody(true), true);
            return $json_data;
        }
        else {
            throw new FailedAccountRequestException($response->getBody(true));
        }
    }

    public function getAccountDataById($id)
    {
        return $this->find(array('id' => $id), array());
    }

    /**
     * Find an account in global chromedia by accountId
     *
     * @param \Istudyante\UserBundle\Entity\SiteUser $user
     * @return SiteUser
     */
    public function getUser(\Istudyante\UserBundle\Entity\SiteUser $user)
    {

        if ($user->getAccountId()){

            $response = $this->request->get($this->chromediaAccountsUri.'/'.$user->getAccountId());
            if (200 == $response->getStatusCode()) {
                $accountData = \json_decode($response->getBody(true), true);

                return $this->hydrateAccountData($user, $accountData);
            }
            else {
                throw new FailedAccountRequestException($response->getBody(true));
            }
        }
        else {
            throw new FailedAccountRequestException("Cannot get Account with no id");
        }
    }
}