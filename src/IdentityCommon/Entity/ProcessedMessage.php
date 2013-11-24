<?php
namespace IdentityCommon\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * ProcessedMessage
 *
 * @ORM\Entity
 */
class ProcessedMessage {
    const TYPE_REGISTRATION = 'registration';
    const TYPE_RESET = 'reset';
    const TYPE_DELETION = 'deletion';

    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;
    
    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $type;
    
    /**
     * @var string
     * @ORM\Column(type="text")
     */
    protected $link;
    
    /**
     * @var ReceivedMessage
     * @ORM\OneToOne(targetEntity="IdentityCommon\Entity\ReceivedMessage")
     * @ORM\JoinColumn(name="received_message_id", referencedColumnName="id")
     */
    protected $receivedMessage;
    
    public function getId() {
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
        return $this;
    }
    
    public function getType() {
        return $this->type;
    }
    
    public function setType($type) {
        $this->type = $type;
        return $this;
    }
    
    public function getLink() {
        return $this->link;
    }
    
    public function setLink($link) {
        $this->link = $link;
        return $this;
    }
    
    public function getCode() {
        return $this->code;
    }
    
    public function setCode($code) {
        $this->code = $code;
        return $this;
    }
    
    public function getReceivedMessage() {
        return $this->receivedMessage;
    }
    
    public function setReceivedMessage($receivedMessage) {
        $this->receivedMessage = $receivedMessage;
        return $this;
    }
}
