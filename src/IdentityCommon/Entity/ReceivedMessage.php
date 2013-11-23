<?php
namespace IdentityCommon\Entity;

use DateTime;

class ReceivedMessage extends AbstractEntity
{
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
     * @var string
     * @ORM\Column(type="text")
     */
    protected $content;
    
    public function __construct() {
        $this->setCreated(new DateTime);
        $this->setProcessed(false);
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
    
    public function getContent() {
        return $this->content;
    }
    
    public function setContent($content) {
        $this->content = $content;
        return $this;
    }
    
}
