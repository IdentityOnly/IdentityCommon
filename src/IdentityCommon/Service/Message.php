<?php
namespace IdentityCommon\Service;

use IdentityCommon\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

class Message extends AbstractService
{
    public function findUnprocessedReceivedMessages() {
        $entityManager = $this->getEntityManager();
        
        return new ArrayCollection($entityManager->getRepository('IdentityCommon\Entity\ReceivedMessage')
            ->findBy(array(
                'processed' => false
            )));
    }

    public function saveReceivedMessage(Entity\ReceivedMessage $message, $flush = true) {
        $entityManager = $this->getEntityManager();
        
        $entityManager->persist($message);
        if($flush) {
            $entityManager->flush();
        }
        
        return $message;
    }
    
    public function saveReceivedMessages(Collection $messages, $flush = true) {
        $entityManager = $this->getEntityManager();
    
        foreach($messages as $message) {
            $this->saveReceivedMessage($message, false);
        }
        
        if($flush) {
            $entityManager->flush();
        }
        
        return $messages;
    }
    
    public function saveProcessedMessage(Entity\ProcessedMessage $message, $flush = true) {
        $entityManager = $this->getEntityManager();
        
        $entityManager->persist($message);
        if($flush) {
            $entityManager->flush();
        }
        
        return $message;
    }
    
    public function saveProcessedMessages(Collection $messages, $flush = true) {
        $entityManager = $this->getEntityManager();
    
        foreach($messages as $message) {
            $this->saveProcessedMessage($message, false);
        }
        
        if($flush) {
            $entityManager->flush();
        }
        
        return $messages;
    }
}
