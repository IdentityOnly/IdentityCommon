<?php
namespace IdentityCommon\Entity\User\PublicKey;

use DateTime;
use RuntimeException;

use Doctrine\ORM\Mapping as ORM;
/**
 * Token
 *
 * @ORM\Entity
 * @ORM\Table(name="User_PublicKey_Token")
 */
class Token {
    const CRYPT_TYPE = 5;
    const CRYPT_ROUNDS = 10;

    /**
     * @var string
     * @ORM\Id
     * @ORM\Column(type="string", length=64)
     */
    protected $code;
    
    /**
     * @var DateTime
     * @ORM\Column(type="datetime")
     */
    protected $created;
    
    /**
     * @var PublicKey
     * @ORM\ManyToOne(targetEntity="IdentityCommon\Entity\User\PublicKey", inversedBy="tokens", fetch="EAGER")
     */
    protected $publicKey;
    
    public function __construct() {
        $rand = mt_rand();
        if(!is_int($rand)) {
            throw new RuntimeException('Could not generate a cryptographically secure value');
        }
        $code = crypt('', '$'.self::CRYPT_TYPE.'$rounds='.self::CRYPT_ROUNDS.'$'.$rand.'$');
    
        $this->setCode($code);
        $this->setCreated(new DateTime);
    }
    
    public function getCode() {
        return $this->code;
    }
    
    public function setCode($code) {
        $this->code = $code;
        return $this;
    }
    
    public function getCreated() {
        return $this->created;
    }
    
    public function setCreated($created) {
        $this->created = $created;
        return $this;
    }
    
    public function getPublicKey() {
        return $this->publicKey;
    }
    
    public function setPublicKey($publicKey) {
        $this->publicKey = $publicKey;
        return $this;
    }
}
