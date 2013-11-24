<?php
namespace IdentityCommon\Entity\User;

use Doctrine\Common\Collections\ArrayCollection;

use Doctrine\ORM\Mapping as ORM;
/**
 * PublicKey
 *
 * @ORM\Entity
 * @ORM\Table(name="User_PublicKey")
 */
class PublicKey {
    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;
    
    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="IdentityCommon\Entity\User", inversedBy="publicKeys", fetch="EAGER")
     */
    protected $user;
    
    /**
     * @var string
     * @ORM\Column(type="text")
     */
    protected $data;
    
    /**
     * @var PublicKey\Token
     * @ORM\OneToMany(targetEntity="IdentityCommon\Entity\User\PublicKey\Token", mappedBy="publicKey", fetch="EXTRA_LAZY", cascade={"all"})
     */
    protected $tokens;
    
    public function __construct() {
        $this->setTokens(new ArrayCollection);
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
        return $this;
    }
    
    public function getData() {
        return $this->data;
    }
    
    public function setData($data) {
        $this->data = $data;
        return $this;
    }
    
    public function getTokens() {
        return $this->tokens;
    }
    
    public function setTokens($tokens) {
        $this->tokens = $tokens;
        return $this;
    }
}
