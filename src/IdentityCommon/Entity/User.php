<?php
namespace IdentityCommon\Entity;

use BjyAuthorize\Provider\Role\ProviderInterface;
use Doctrine\Common\Collections;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use ZfcUser\Entity\UserInterface;

/**
 * @ORM\Entity
 */
class User implements UserInterface, ProviderInterface
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=255, unique=true)
     */
    protected $username;

    /**
     * @var string
     * @ORM\Column(type="string", unique=true, length=255)
     */
    protected $email;

    /**
     * @var string
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $displayName;

    /**
     * @var string
     * @ORM\Column(type="string", length=128)
     */
    protected $password;
    
    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="IdentityCommon\Entity\User\PublicKey", mappedBy="user", cascade={"all"})
     */
    protected $publicKeys;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    protected $state;

    /**
     * @var Collection
     * @ORM\ManyToMany(targetEntity="IdentityCommon\Entity\User\Role")
     * @ORM\JoinTable(name="User_Role_linker",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="role_id", referencedColumnName="id")}
     * )
     */
    protected $roles;

    public function __construct()
    {
        $this->setRoles(new ArrayCollection);
        $this->setPublicKeys(new ArrayCollection);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = (int) $id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getDisplayName()
    {
        return $this->displayName;
    }

    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
    
    public function getPublicKeys() {
        return $this->publicKeys;
    }
    
    public function setPublicKeys($publicKeys) {
        $this->publicKeys = $publicKeys;
        return $this;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setState($state)
    {
        $this->state = $state;
    }

    public function getRoles()
    {
        return $this->roles;
    }

    public function addRole($role)
    {
        $this->roles[] = $role;
    }

    public function hasRoleByRoleId($roleId)
    {
        $criteria = Collections\Criteria::create()
            ->where(Collections\Criteria::expr()->eq('roleId', $roleId));

        $roles = $this->getRoles();

        return (bool) count($roles->matching($criteria));
    }
}
