<?php
namespace IdentityCommon\Entity;

use Zend\Mail\Message;
use DateTime;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 */
class ReceivedMessage extends AbstractEntity
{
    const ERROR_PROCESSOR_NOT_FOUND = 404;
    const ERROR_FAILED_PROCESSING = 500;

    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;
    
    /**
     * @var DateTime
     * @ORM\Column(type="datetime")
     */
    protected $created;
    
    /**
     * @var boolean
     * @ORM\Column(type="boolean")
     */
    protected $processed;
    
    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    protected $errorCode;

    /**
     * @var string
     * @ORM\Column(type="text")
     */
    protected $content;
    
    public function __construct() {
        $this->setCreated(new DateTime);
        $this->setProcessed(false);
    }
    
    public function getMessage() {
        if(!($content = $this->getContent())) {
            return null;
        }
        return Message::fromString($content);
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
        return $this;
    }
    
    public function getCreated() {
        return $this->created;
    }
    
    public function setCreated($created) {
        $this->created = $created;
        return $this;
    }
    
    public function getProcessed() {
        return $this->processed;
    }
    
    public function setProcessed($processed) {
        $this->processed = $processed;
        return $this;
    }
    
    public function getErrorCode() {
        return $this->errorCode;
    }
    
    public function setErrorCode($errorCode) {
        $this->errorCode = $errorCode;
        return $this;
    }
    
    public function getContent() {
        return $this->content;
    }
    
    public function setContent($content) {
        $this->content = $content;
        return $this;
    }
    
}
