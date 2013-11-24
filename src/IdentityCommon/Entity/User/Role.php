<?php
namespace IdentityCommon\Entity\User;

use BjyAuthorize\Acl\HierarchicalRoleInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="User_Role")
 */
class Role implements HierarchicalRoleInterface
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
    protected $roleId;

    /**
     * @var Role
     * @ORM\ManyToOne(targetEntity="IdentityCommon\Entity\User\Role")
     */
    protected $parent;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = (int) $id;
    }

    public function getRoleId()
    {
        return $this->roleId;
    }

    public function setRoleId($roleId)
    {
        $this->roleId = (string) $roleId;
    }

    public function getParent()
    {
        return $this->parent;
    }

    public function setParent(Role $parent)
    {
        $this->parent = $parent;
    }
}
